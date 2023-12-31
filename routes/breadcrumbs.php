<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
  $trail->push(trans('page.overview.title'), route('home'));
});

// Roles Breadcrumbs
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.roles.index'), route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.create'), route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.edit'), route('roles.edit', $role->uuid));
});

Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $role) {
  $trail->parent('roles.index');
  $trail->push(trans('page.roles.show'), route('roles.show', $role->uuid));
});
// Roles Breadcrumbs

// Users Breadcrumbs
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.users.index'), route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.create'), route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.edit'), route('users.edit', $user->uuid));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
  $trail->parent('users.index');
  $trail->push(trans('page.users.show'), route('users.show', $user->uuid));
});
// Users Breadcrumbs

// Disturbances Breadcrumbs
Breadcrumbs::for('disturbances.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.disturbances.index'), route('disturbances.index'));
});

Breadcrumbs::for('disturbances.create', function (BreadcrumbTrail $trail) {
  $trail->parent('disturbances.index');
  $trail->push(trans('page.disturbances.create'), route('disturbances.create'));
});

Breadcrumbs::for('disturbances.edit', function (BreadcrumbTrail $trail, $disturbance) {
  $trail->parent('disturbances.index');
  $trail->push(trans('page.disturbances.edit'), route('disturbances.edit', $disturbance->uuid));
});

Breadcrumbs::for('disturbances.show', function (BreadcrumbTrail $trail, $disturbance) {
  $trail->parent('disturbances.index');
  $trail->push(trans('page.disturbances.show'), route('disturbances.show', $disturbance->uuid));
});
// Disturbances Breadcrumbs

// degrees Breadcrumbs
Breadcrumbs::for('degrees.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.degrees.index'), route('degrees.index'));
});

Breadcrumbs::for('degrees.create', function (BreadcrumbTrail $trail) {
  $trail->parent('degrees.index');
  $trail->push(trans('page.degrees.create'), route('degrees.create'));
});

Breadcrumbs::for('degrees.edit', function (BreadcrumbTrail $trail, $degree) {
  $trail->parent('degrees.index');
  $trail->push(trans('page.degrees.edit'), route('degrees.edit', $degree->uuid));
});

Breadcrumbs::for('degrees.show', function (BreadcrumbTrail $trail, $degree) {
  $trail->parent('degrees.index');
  $trail->push(trans('page.degrees.show'), route('degrees.show', $degree->uuid));
});
// degrees Breadcrumbs

// Symptoms Breadcrumbs
Breadcrumbs::for('symptoms.index', function (BreadcrumbTrail $trail) {
  $trail->parent('home');
  $trail->push(trans('page.symptoms.index'), route('symptoms.index'));
});

Breadcrumbs::for('symptoms.create', function (BreadcrumbTrail $trail) {
  $trail->parent('symptoms.index');
  $trail->push(trans('page.symptoms.create'), route('symptoms.create'));
});

Breadcrumbs::for('symptoms.edit', function (BreadcrumbTrail $trail, $symptom) {
  $trail->parent('symptoms.index');
  $trail->push(trans('page.symptoms.edit'), route('symptoms.edit', $symptom->uuid));
});

Breadcrumbs::for('symptoms.show', function (BreadcrumbTrail $trail, $symptom) {
  $trail->parent('symptoms.index');
  $trail->push(trans('page.symptoms.show'), route('symptoms.show', $symptom->uuid));
});
// Symptoms Breadcrumbs