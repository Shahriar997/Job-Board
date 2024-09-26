<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card class="mb-4" :$job >
        <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($job->description)) !!}</p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <a class="" href="{{ route('jobs.show', $otherJob) }}">
                <div class="mb-4 flex justify-between items-center hover:rounded-md hover:border hover:border-slate-300 hover:bg-gradient-to-r bg:from-indigo-100 bg:via-purple-100  to-pink-100 px-2 py-1.5">
                    <div>
                        <div class="text-slate-700">
                           {{ $otherJob->title }}
                        </div>
                        <div class="text-xs">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{number_format($otherJob->salary)}}
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </x-card>    
</x-layout>

