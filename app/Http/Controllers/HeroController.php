<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use App\Superpower;

class HeroController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $heroes = Hero::all();
        return view('hero', ['heroes' => $heroes]);
    }
    public function getOne($id)
    {
      $hero = Hero::find($id);
      return view('hero', ['hero' => $hero]);
    }
    public function newHeroForm()
      {
        $superpowers = Superpower::all();
        $superpowersArray = array();
        $superpowersID = array();

        foreach ($superpowers as $superpower) {
          $superpowersID[] = $superpower->id;
          $superpowersArray[$superpower->id] = $superpower->name;
        }
        return view('newHero', ['superpowers' => $superpowersArray, 'superpowersId' => $superpowersID]);

    }
    public function insertOne(Request $request)
    {

      $hero = new Hero;
      $hero->name = $request->name;
      $hero->force = $request->force;
      $hero->sex = $request->sex;
      $hero->save();


      foreach ($request->powers as $key => $value) {
      $existingPower = Superpower::find($value);
      $hero->superpowers()->attach($existingPower->id);
      }

      return redirect('/heroes');
    }
    public function deleteOne(Request $request, $id)
    {
      Hero::destroy($id);
      return redirect('/heroes');
    }
    public function updateOne(Request $request)
    {
      $hero = Hero::find($request->id);
      $hero->name = $request->name;
      $hero->force = $request->force;
      $hero->sex = $request->sex;
      $hero->save();

      if(is_array($request->powers))
      {
      $hero->superpowers()->sync($request->powers);
    }else {
      $hero->superpowers()->detach();
    }
      return redirect('/heroes');
    }
    public function heroUpdate($id)
    {
      $nemesisgroup = Hero::all();
      $hero = Hero::find($id);
      $superpowers = Superpower::all();
      $nemesisArray = array();
      $nemesisID = array();
      $superpowersArray = array();
      $superpowersID = array();

      foreach ($nemesisgroup as $nemesis) {
        $nemesisID[] = $nemesis->id;
        $nemesisArray[$nemesis->id] = $nemesis->name;
      }
      foreach ($superpowers as $superpower) {
        $superpowersID[] = $superpower->id;
        $superpowersArray[$superpower->id] = $superpower->name;
      }

      return view('newHero', ['updatedHero' =>$hero, 'superpowers' => $superpowersArray, 'superpowersId' => $superpowersID],['updatedHero' =>$hero, 'nemesisgroup' => $nemesisArray, 'nemesisId' => $nemesisID]);
    }
  }
