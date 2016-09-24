<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Models\Contact;
use Models\MasterModel;
use Response, Redirect, Session, Validator, DB, Auth, Excel, PDF;

class ContactController extends Controller
{
    //
    private $table = "contacts";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        return view("admin.contact.index", [
            'user' => Auth::user(),
            'active' => 'contact',
            'message' => Contact::where('publish', 0)->count(),
            'result' => Contact::RecursiveIndexAdmin()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        MasterModel::CreateContent($this->table, ['publish' => 1], ['id' => $id]);
        $result = Contact::find($id);
        return view("admin.contact.edit", [
            'user' => Auth::user(),
            'active' => 'contact',
            'action' => 'Edit',
            'message' => Contact::where('publish', 0)->count(),
            'result' => $result,
        ]);
    }

    /**
     * Delete item by id using method get
     * @param $id
     * @return mixed
     */
    public function getDelete($id)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $check = Contact::find($id);
        if(count($check) > 0) {
            Contact::find($id)->delete();
        }
        Session::flash('delete','success');
        return Redirect::to('admin/contact/list');
    }

    /**
     * Delete all item using checkbox, method post
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request)
    {
        if(!Auth::check() || Auth::user()->type != 1)
        {
            return Redirect::to('admin');
        }
        $id = $request->get('id');
        Contact::whereIn('id',$id)->delete();
        Session::flash('delete','success');
        return Redirect::to('admin/contact/list');
    }

    /**
     * export data to excel
     */
    public function exportXLS()
    {
        $contact = Contact::all();
        Excel::create('List Contact', function($excel) use ($contact) {

            $excel->sheet('List Contact', function($sheet) use ($contact) {

                $sheet->fromArray($contact);

            });

        })->export('xlsx');
    }

    /**
     * export data to pdf
     */
    public function exportPDF()
    {
        $pdf = PDF::loadView('admin.contact.pdf', ['data' => Contact::all()]);
        return $pdf->download('List_Contact.pdf');
    }
}
