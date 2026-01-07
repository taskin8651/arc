<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNewsletterSubscriberRequest;
use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Http\Requests\UpdateNewsletterSubscriberRequest;
use App\Models\NewsletterSubscriber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsletterSubscribersController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('newsletter_subscriber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletterSubscribers = NewsletterSubscriber::all();

        return view('admin.newsletterSubscribers.index', compact('newsletterSubscribers'));
    }

    public function create()
    {
        abort_if(Gate::denies('newsletter_subscriber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletterSubscribers.create');
    }

    public function store(StoreNewsletterSubscriberRequest $request)
    {
        $newsletterSubscriber = NewsletterSubscriber::create($request->all());

        return redirect()->route('admin.newsletter-subscribers.index');
    }

    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        abort_if(Gate::denies('newsletter_subscriber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletterSubscribers.edit', compact('newsletterSubscriber'));
    }

    public function update(UpdateNewsletterSubscriberRequest $request, NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->update($request->all());

        return redirect()->route('admin.newsletter-subscribers.index');
    }

    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        abort_if(Gate::denies('newsletter_subscriber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsletterSubscribers.show', compact('newsletterSubscriber'));
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        abort_if(Gate::denies('newsletter_subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletterSubscriber->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsletterSubscriberRequest $request)
    {
        $newsletterSubscribers = NewsletterSubscriber::find(request('ids'));

        foreach ($newsletterSubscribers as $newsletterSubscriber) {
            $newsletterSubscriber->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
