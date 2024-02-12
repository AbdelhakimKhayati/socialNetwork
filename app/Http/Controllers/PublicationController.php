<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicationRequest;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->paginate(50);
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $formFields = $request->validated();
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('publication', 'public');
        }
        $formFields['profile_id'] = Auth::id();
        Publication::create($formFields);
        return to_route('home')->with('success', 'la publication est bien ete ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        // Gate::authorize('update', $publication);
        // policy
        $this->authorize('update', $publication);
        return view('publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFields = $request->validated();
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('publication', 'public');
        }
        $pub = $publication->fill($formFields)->save();

        return to_route('publication.index')->with('success', 'la publication a ete bien modifier');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        return to_route('publication.index')->with('success', 'la publication a ete bien supprimer');
    }
}
