<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});
// Dashboard > Home
Breadcrumbs::for('dashboard_home', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Home', ('#'));
});
// Dashboard > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});

// Dashboard > Categories > Create
Breadcrumbs::for('add_categories', function ($trail) {
    $trail->parent('categories');
    $trail->push('Add', route('categories.create'));
});
// Dashboard > Categories > Detail
Breadcrumbs::for('detail_categories', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push('Detail', route('categories.show', ['category' => $category]));
});
// Dashboard > Categories > Detail [title]
Breadcrumbs::for('detail_categories_title', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push($category->title, route('categories.show', ['category' => $category]));
});

// Dashboard > Categories > Edit >
Breadcrumbs::for('edit_categories_title', function ($trail, $category) {
    $trail->parent('categories', $category);
    $trail->push($category->title, route('categories.edit', ['category' => $category]));
});
// Dashboard > Tags
Breadcrumbs::for('tags', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
// Dashboard > Tags > add tags
Breadcrumbs::for('add_tags', function ($trail) {
    $trail->parent('tags');
    $trail->push('Add', route('tags.index'));
});
// Dashboard > Tags > Edit [title]
Breadcrumbs::for('edit_tags', function ($trail, $tag) {
    $trail->parent('tags');
    $trail->push('Edit', route('tags.edit', ['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});
// Dashboard > Posts
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});
// Dashboard > Posts > add posts
Breadcrumbs::for('add_posts', function ($trail) {
    $trail->parent('posts');
    $trail->push('Add', route('posts.create'));
});
// Dashboard > Posts > detail posts
Breadcrumbs::for('detail_posts', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Detail', route('posts.show', ['post' => $post]));
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});
// Dashboard > Posts > detail posts
Breadcrumbs::for('edit_posts', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push('Edit', route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});
// Dashboard > File manager
Breadcrumbs::for('file_manager', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('File manager', route('filemanager.index'));
});

// Dashboard > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

// Dashboard > Role > detail
Breadcrumbs::for('detail_role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push('Detail', route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});

// Dashboard > Role > add
Breadcrumbs::for('add_role', function ($trail) {
    $trail->parent('roles');
    $trail->push('Add', route('roles.create'));
});

// Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });