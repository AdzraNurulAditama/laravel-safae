<div class="mt-20">

    <div class="flex items-center justify-between mb-8">

        <div>
            <h2 class="text-4xl font-black text-white mb-2">
                Resume Pembaca
            </h2>

            <p class="text-slate-400">
                Lihat pendapat dan teori dari pembaca lain.
            </p>
        </div>

    </div>

    <div class="space-y-8">

        @foreach($book->resumes as $resume)

            <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-xl">

                <div class="flex items-center gap-4 mb-6">

                    <img src="{{ asset($resume->user->photo ?? 'images/default.jpg') }}"
                         class="w-14 h-14 rounded-full object-cover">

                    <div>
                        <div class="font-bold text-white text-lg">
                            {{ $resume->user->name }}
                        </div>

                        <div class="text-slate-400 text-sm">
                            {{ $resume->created_at->diffForHumans() }}
                        </div>
                    </div>

                </div>

                @if($resume->title)
                    <h3 class="text-2xl font-bold text-white mb-5">
                        {{ $resume->title }}
                    </h3>
                @endif

                @if($resume->has_spoiler)

                    <div x-data="{ open: false }">

                        <div x-show="!open"
                             class="bg-red-500/10 border border-red-500/20 rounded-2xl p-6 text-center">

                            <div class="text-red-300 text-xl font-bold mb-3">
                                ⚠ Spoiler Alert
                            </div>

                            <button @click="open = true"
                                    class="bg-red-500 hover:bg-red-600 px-6 py-3 rounded-xl font-semibold text-white transition-all duration-300">
                                Lihat Spoiler
</div>