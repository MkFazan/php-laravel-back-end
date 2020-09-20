<?php

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Pages\PageRepository;
use App\Repositories\Properties\PropertyRepository;
use App\Repositories\QuestionAnswers\QuestionAnswerRepository;
use App\Repositories\QuestionCategories\QuestionCategoryRepository;
use App\Repositories\Replaces\ReplaceRepository;
use App\Services\Categories\CategoryService;
use App\Services\Pages\PageService;
use App\Services\Properties\PropertyService;
use App\Services\QuestionAnswers\QuestionAnswerService;
use App\Services\QuestionCategory\QuestionCategoryServices;
use App\Services\Replaces\ReplaceService;

function getCurrentLocale()
{
    return Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
}

function getPages()
{
    $pageRepository = new PageRepository;
    $pageService = new PageService($pageRepository);
    return $pageService->getAll()->where('status', '=', 1);
}

function getCategories()
{
    $categoryRepository = new CategoryRepository;
    $categoryService = new CategoryService($categoryRepository);
    return $categoryService->getRootCategory()->where('status', '=', 1);
}

function getProperties()
{
    $propertyService = new PropertyService();
    return $propertyService->getAll()->where('status', '=', 1);
}

function getQuestionAnswers()
{

    $questionAnswerRepository = new QuestionAnswerRepository;
    $questionAnswerService = new QuestionAnswerService($questionAnswerRepository);
    return $questionAnswerService->getAll()->where('status', '=', 1);
}

function getQuestionCategories()
{
    $questionCategoryRepository = new QuestionCategoryRepository;
    $questionAnswerRepository = new QuestionAnswerRepository;
    $questionCategoryService = new QuestionCategoryServices($questionCategoryRepository, $questionAnswerRepository);
    return $questionCategoryService->getAll()->where('status', '=', 1);
}

function getReplaces()
{
    $replaceRepository = new ReplaceRepository;
    $replaceService = new ReplaceService($replaceRepository);
    return $replaceService ->getAll()->where('status', '=', 1);
}
