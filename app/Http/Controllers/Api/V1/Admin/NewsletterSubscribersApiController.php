<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Http\Requests\UpdateNewsletterSubscriberRequest;
use App\Http\Resources\Admin\NewsletterSubscriberResource;
use App\Models\NewsletterSubscriber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsletterSubscribersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newsletter_subscriber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsletterSubscriberResource(NewsletterSubscriber::all());
    }

    public function store(StoreNewsletterSubscriberRequest $request)
    {
        $newsletterSubscriber = NewsletterSubscriber::create($request->all());

        return (new NewsletterSubscriberResource($newsletterSubscriber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        abort_if(Gate::denies('newsletter_subscriber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsletterSubscriberResource($newsletterSubscriber);
    }

    public function update(UpdateNewsletterSubscriberRequest $request, NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->update($request->all());

        return (new NewsletterSubscriberResource($newsletterSubscriber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        abort_if(Gate::denies('newsletter_subscriber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletterSubscriber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
