<x-Card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">
            ${{ number_format($job->salary) }}
        </div>
    </div>
    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>{{ $job->employer->company_name}}</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-4 text-xs">
            <x-Tag>
                <a href="{{ route('jobs.index', ['experience'=> $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}    
                </a>
            </x-Tag>
            <x-Tag>
                <a href="{{ route('jobs.index', ['category'=> $job->category]) }}">
                    {{ Str::ucfirst($job->category) }}    
                </a>
            </x-Tag>
        </div>
    </div>
    
    {{ $slot }}
 </x-Card>