@extends('layouts/default')

{{-- Page title --}}
@section('title')
@parent
{{{ trans("action.{$mode}") }}} {{ trans('sanatorium/rewards::payoffs/common.title') }}
@stop

{{-- Queue assets --}}
{{ Asset::queue('validate', 'platform/js/validate.js', 'jquery') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- Page content --}}
@section('page')

<section class="panel panel-default panel-tabs">

	{{-- Form --}}
	<form id="rewards-form" action="{{ request()->fullUrl() }}" role="form" method="post" data-parsley-validate>

		{{-- Form: CSRF Token --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<header class="panel-heading">

			<nav class="navbar navbar-default navbar-actions">

				<div class="container-fluid">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#actions">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="btn btn-navbar-cancel navbar-btn pull-left tip" href="{{ route('admin.sanatorium.rewards.payoffs.all') }}" data-toggle="tooltip" data-original-title="{{{ trans('action.cancel') }}}">
							<i class="fa fa-reply"></i> <span class="visible-xs-inline">{{{ trans('action.cancel') }}}</span>
						</a>

						<span class="navbar-brand">{{{ trans("action.{$mode}") }}} <small>{{{ $payoff->exists ? $payoff->id : null }}}</small></span>
					</div>

					{{-- Form: Actions --}}
					<div class="collapse navbar-collapse" id="actions">

						<ul class="nav navbar-nav navbar-right">

							@if ($payoff->exists)
							<li>
								<a href="{{ route('admin.sanatorium.rewards.payoffs.delete', $payoff->id) }}" class="tip" data-action-delete data-toggle="tooltip" data-original-title="{{{ trans('action.delete') }}}" type="delete">
									<i class="fa fa-trash-o"></i> <span class="visible-xs-inline">{{{ trans('action.delete') }}}</span>
								</a>
							</li>
							@endif

							<li>
								<button class="btn btn-primary navbar-btn" data-toggle="tooltip" data-original-title="{{{ trans('action.save') }}}">
									<i class="fa fa-save"></i> <span class="visible-xs-inline">{{{ trans('action.save') }}}</span>
								</button>
							</li>

						</ul>

					</div>

				</div>

			</nav>

		</header>

		<div class="panel-body">

			<div role="tabpanel">

				{{-- Form: Tabs --}}
				<ul class="nav nav-tabs" role="tablist">
					<li class="active" role="presentation"><a href="#general-tab" aria-controls="general-tab" role="tab" data-toggle="tab">{{{ trans('sanatorium/rewards::payoffs/common.tabs.general') }}}</a></li>
					<li role="presentation"><a href="#attributes" aria-controls="attributes" role="tab" data-toggle="tab">{{{ trans('sanatorium/rewards::payoffs/common.tabs.attributes') }}}</a></li>
				</ul>

				<div class="tab-content">

					{{-- Tab: General --}}
					<div role="tabpanel" class="tab-pane fade in active" id="general-tab">

						<fieldset>

							<div class="row">

								<div class="form-group{{ Alert::onForm('points', ' has-error') }}">

									<label for="points" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/rewards::payoffs/model.general.points_help') }}}"></i>
										{{{ trans('sanatorium/rewards::payoffs/model.general.points') }}}
									</label>

									<input type="text" class="form-control" name="points" id="points" placeholder="{{{ trans('sanatorium/rewards::payoffs/model.general.points') }}}" value="{{{ input()->old('points', $payoff->points) }}}">

									<span class="help-block">{{{ Alert::onForm('points') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('payoff_money', ' has-error') }}">

									<label for="payoff_money" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_money_help') }}}"></i>
										{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_money') }}}
									</label>

									<input type="text" class="form-control" name="payoff_money" id="payoff_money" placeholder="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_money') }}}" value="{{{ input()->old('payoff_money', $payoff->payoff_money) }}}">

									<span class="help-block">{{{ Alert::onForm('payoff_money') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('payoff_id', ' has-error') }}">

									<label for="payoff_id" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_id_help') }}}"></i>
										{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_id') }}}
									</label>

									<input type="text" class="form-control" name="payoff_id" id="payoff_id" placeholder="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_id') }}}" value="{{{ input()->old('payoff_id', $payoff->payoff_id) }}}">

									<span class="help-block">{{{ Alert::onForm('payoff_id') }}}</span>

								</div>

								<div class="form-group{{ Alert::onForm('payoff_type', ' has-error') }}">

									<label for="payoff_type" class="control-label">
										<i class="fa fa-info-circle" data-toggle="popover" data-content="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_type_help') }}}"></i>
										{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_type') }}}
									</label>

									<input type="text" class="form-control" name="payoff_type" id="payoff_type" placeholder="{{{ trans('sanatorium/rewards::payoffs/model.general.payoff_type') }}}" value="{{{ input()->old('payoff_type', $payoff->payoff_type) }}}">

									<span class="help-block">{{{ Alert::onForm('payoff_type') }}}</span>

								</div>


							</div>

						</fieldset>

					</div>

					{{-- Tab: Attributes --}}
					<div role="tabpanel" class="tab-pane fade" id="attributes">
						@attributes($payoff)
					</div>

				</div>

			</div>

		</div>

	</form>

</section>
@stop
