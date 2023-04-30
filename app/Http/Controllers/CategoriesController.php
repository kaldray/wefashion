<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $cat = Categories::simplePaginate(15);
    return view("admin.categories", ["categories" => $cat]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view("admin.categories.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategoriesRequest $request): RedirectResponse
  {
    Categories::create($request->validated());
    return redirect()
      ->route("categories.index")
      ->with("succes", "La catégorie éte ajouter avec succès");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Categories $category): View
  {
    return view("admin.categories.edit", ["categories" => $category]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(
    Categories $category,
    CategoriesRequest $request
  ): RedirectResponse {
    $category->update($request->validated());
    return redirect()
      ->route("categories.index", ["category" => $category->id])
      ->with("succes", "La catégorie a éte modifié avec succès");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Categories $category): RedirectResponse
  {
    $category->delete();
    return redirect()
      ->route("categories.index")
      ->with("succes", "La catégorie a éte supprimé avec succès");
  }
}
