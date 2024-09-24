<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];

    //TODO: make this dynamic by fetching from db
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    /**
     * get all jobs by filters
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllJobs(): Collection
    {
        $jobs = self::query();

        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->whereRaw('LOWER(`title`) LIKE ?', ['%' . request('search') . '%'])
                    ->orWhereRaw('LOWER(`description`) LIKE ?', ['%' . request('search') . '%']);
            });
        })->when(request('min_salary'), function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'), function ($query) {
            $query->where('experience', request('experience'));
        })->when(request('category'), function ($query) {
            $query->where('category', request('category'));
        });

        return $jobs->get();
    }
}
