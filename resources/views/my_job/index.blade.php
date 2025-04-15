<x-layout>
    <x-breadcrumbs :links="[
        'My Jobs' => '#',
        ]" />
    
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}"> Add New </x-link-button>
    </div>
    
    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>
                                {{$application->user->name}}
                            </div>
                            <div>
                                Applied {{$application->created_at->diffForHumans()}}
                            </div>
                            <div>
                                Download CV
                            </div>
                        </div>
                        <div>${{$application->expected_salary}}</div>
                    </div>
                @empty
                    No Applications yet
                @endforelse

                <div class="flex space-x-2">
                    <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>DELETE</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No Jobs Yet
            </div>
            <div class="text-center">
                Post Your first job <a href="{{ route('my-jobs.create') }}"
                    class="text-indigo-500 hover:underline"></a>
            </div>
        </div>
    @endforelse
    
</x-layout>