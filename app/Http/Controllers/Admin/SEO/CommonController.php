<?php

namespace App\Http\Controllers\Admin\SEO;
use App\Http\Controllers\Controller;
use App\Models\Redirection;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function redirection()
    {
        $redirections = Redirection::all();
        return view('admin.SEO.redirections.index', compact('redirections'));
    }

    public function redirectionStore(Request $request)
    {
        $request->validate([
            'redirect_from' => 'required',
            'redirect_to' => 'required',
        ]);

        Redirection::create([
            'redirect_from' => $request->redirect_from,
            'redirect_to' => $request->redirect_to,
        ]);

        return redirect()->route('seo.redirection.index')->with('success', 'Redirection created successfully!');
    }

    public function redirectionEdit($id)
    {
        $redirection = Redirection::findOrFail($id);
        return view('admin.SEO.redirections.edit', compact('redirection'));
    }

    public function redirectionUpdate(Request $request, $id)
    {
        $request->validate([
            'redirect_from' => 'required',
            'redirect_to' => 'required',
        ]);

        $redirection = Redirection::findOrFail($id);
        $redirection->update([
            'redirect_from' => $request->redirect_from,
            'redirect_to' => $request->redirect_to,
        ]);

        return redirect()->route('seo.redirection.index')->with('success', 'Redirection updated successfully!');
    }

    public function redirectionDestroy($id)
    {
        $redirection = Redirection::findOrFail($id);
        $redirection->delete();

        return redirect()->route('seo.redirection.index')->with('success', 'Redirection deleted successfully!');
    }
}
