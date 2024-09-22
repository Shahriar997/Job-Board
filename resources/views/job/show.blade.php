<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card class="mb-4" :$job />
</x-layout>

