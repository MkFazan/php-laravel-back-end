<?php


namespace App\Providers;

use App\Services\Comments\CommentService;
use App\Services\Comments\CommentServiceInterface;
use App\Services\Pages\PageService;
use App\Services\Pages\PageServiceInterface;
use App\Services\Products\ProductService;
use App\Services\Products\ProductServiceInterface;
use App\Services\Properties\PropertyService;
use App\Services\Properties\PropertyServiceInterface;
use App\Services\Categories\CategoryService;
use App\Services\Categories\CategoryServiceInterface;
use App\Services\Images\ImageService;
use App\Services\Images\ImageServiceInterface;
use App\Services\PropertyValues\PropertyValueService;
use App\Services\PropertyValues\PropertyValueServiceInterface;
use App\Services\Replaces\ReplaceService;
use App\Services\Replaces\ReplaceServiceInterface;
use App\Services\QuestionAnswers\QuestionAnswerService;
use App\Services\QuestionAnswers\QuestionAnswerServiceInterface;
use App\Services\QuestionCategory\QuestionCategoryServices;
use App\Services\QuestionCategory\QuestionCategoryServicesInterface;
use App\Services\Slides\SlideService;
use App\Services\Slides\SlideServiceInterface;
use App\Services\Subscribers\SubscriberService;
use App\Services\Subscribers\SubscriberServiceInterface;
use App\Services\Users\UserService;
use App\Services\Users\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }
}
