<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromocodeRequest;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Zorb\Promocodes\Exceptions\PromocodeAlreadyUsedByUserException;
use Zorb\Promocodes\Exceptions\PromocodeBoundToOtherUserException;
use Zorb\Promocodes\Exceptions\PromocodeDoesNotExistException;
use Zorb\Promocodes\Exceptions\PromocodeExpiredException;
use Zorb\Promocodes\Exceptions\PromocodeNoUsagesLeftException;
use Zorb\Promocodes\Facades\Promocodes;
use Zorb\Promocodes\Models\Promocode;

class PromocodeController extends Controller
{

    public function index()
    {
        $promocodes = Promocodes::all();
        return view('admin/promocodes/promocodes', compact('promocodes'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin/promocodes/create', compact('users'));
    }

    public function store(PromocodeRequest $request)
    {
        $data = $request->validated();

        if($data['user_id'] == -1)
        {
            Promocodes::mask('**-***-**')
            ->characters('ABCDERTYUIOP123456789')
            ->multiUse()
            ->count($data['count'])
            ->usages($data['usages'])
            ->expiration(now()->addYear())
            ->details([ 'discount' => $data['discount'] ])
            ->create();
        }else{
            Promocodes::mask('**-***-**')
            ->characters('ABCDERTYUIOP123456789')
            ->multiUse()
            ->user(User::find($data['user_id']))
            ->count($data['count'])
            ->usages($data['usages'])
            ->expiration(now()->addYear())
            ->details([ 'discount' => $data['discount'] ])
            ->create();
        }

        return redirect()->route('admin.promocodes.index')->with('success', 'Promocode successfully created');

    }

    public function show(Promocode $promocode)
    {
        return view('admin/promocodes/show', compact('promocode'));
    }

    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return redirect()->route('admin.promocodes')->with('success', 'Promocode successfully deleted');
    }

    public function apply(Request $request)
    {
        $user = auth()->user();
        $promocode = Promocodes::code($request->input('coupon'));
        try{
            $discount = $promocode->user($user)->apply()->details['discount'];
        }catch (PromocodeDoesNotExistException $e){
           return redirect()->back()->with('error', $e->getMessage());
        }catch (PromocodeAlreadyUsedByUserException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }catch (PromocodeBoundToOtherUserException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }catch (PromocodeExpiredException $e){
            return redirect()->back()->with('error', $e->getMessage());
        } catch (PromocodeNoUsagesLeftException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        Cart::instance('cart')->setGlobalDiscount($discount);

        return redirect()->back()->with('success', 'Coupon successfully added');
    }


}
