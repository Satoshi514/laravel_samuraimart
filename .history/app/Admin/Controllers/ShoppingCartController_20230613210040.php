<?php

namespace App\Admin\Controllers;

use App\Models\ShoppingCart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShoppingCartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShoppingCart';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShoppingCart());

        $grid->column('identifier', __('ID'))->sortable();
        $grid->column('instance', __('User ID'))->sortable();
        $grid->column('price_total', __('Price total'))->totalRow();
        $grid->column('qty', __('Qty'))->totalRow();
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter) {
            $filter->disableIdFilter();
            $filter->equal('identifier','ID');
            $filter->equal('instance','User ID');
            $filter->between('created_at','登録日')->datetime;
        });

        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ShoppingCart::findOrFail($id));

        $show->field('identifier', __('Identifier'));
        $show->field('instance', __('Instance'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('buy_flag', __('Buy flag'));
        $show->field('number', __('Number'));
        $show->field('code', __('Code'));
        $show->field('price_total', __('Price total'));
        $show->field('qty', __('Qty'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ShoppingCart());

        $form->text('identifier', __('Identifier'));
        $form->text('instance', __('Instance'));
        $form->textarea('content', __('Content'));
        $form->switch('buy_flag', __('Buy flag'));
        $form->number('number', __('Number'));
        $form->text('code', __('Code'));
        $form->number('price_total', __('Price total'));
        $form->number('qty', __('Qty'))->default(1);

        return $form;
    }
}
