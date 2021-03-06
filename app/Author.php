<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 11/11/18
 * Time: 2:36 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['name', 'email', 'github', 'twitter', 'location', 'latest_article_published'];

    /**
     * {@inheritdoc}
     */
    protected $hidden = [];
}