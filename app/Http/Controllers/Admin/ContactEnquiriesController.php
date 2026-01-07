<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyContactEnquiryRequest;
use App\Http\Requests\StoreContactEnquiryRequest;
use App\Http\Requests\UpdateContactEnquiryRequest;
use App\Models\ContactEnquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactEnquiriesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('contact_enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiries = ContactEnquiry::all();

        return view('admin.contactEnquiries.index', compact('contactEnquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('contact_enquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactEnquiries.create');
    }

    public function store(StoreContactEnquiryRequest $request)
    {
        $contactEnquiry = ContactEnquiry::create($request->all());

        return redirect()->route('admin.contact-enquiries.index');
    }

    public function edit(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactEnquiries.edit', compact('contactEnquiry'));
    }

    public function update(UpdateContactEnquiryRequest $request, ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->update($request->all());

        return redirect()->route('admin.contact-enquiries.index');
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactEnquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactEnquiryRequest $request)
    {
        $contactEnquiries = ContactEnquiry::find(request('ids'));

        foreach ($contactEnquiries as $contactEnquiry) {
            $contactEnquiry->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
