<?php


namespace App\Providers;

use App\Repositories\Comments\CommentRepository;
use App\Repositories\Comments\CommentRepositoryInterface;
use App\Repositories\Pages\PageRepository;
use App\Repositories\Pages\PageRepositoryInterface;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Properties\PropertyRepository;
use App\Repositories\Properties\PropertyRepositoryInterface;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Images\ImageRepository;
use App\Repositories\Images\ImageRepositoryInterface;
use App\Repositories\PropertyValues\PropertyValueRepository;
use App\Repositories\PropertyValues\PropertyValueRepositoryInterface;
use App\Repositories\Replaces\ReplaceRepository;
use App\Repositories\Replaces\ReplaceRepositoryInterface;
use App\Repositories\QuestionAnswers\QuestionAnswerRepository;
use App\Repositories\QuestionAnswers\QuestionAnswerRepositoryInterface;
use App\Repositories\QuestionCategories\QuestionCategoryRepository;
use App\Repositories\QuestionCategories\QuestionCategoryRepositoryInterface;
use App\Repositories\Slides\SlideRepository;
use App\Repositories\Slides\SlideRepositoryInterface;
use App\Repositories\Subscribers\SubscriberRepository;
use App\Repositories\Subscribers\SubscriberRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}
