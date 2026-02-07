<div class="prose prose-slate dark:prose-invert max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
    @if($slug === 'index' || $slug === '')
        <header class="mb-16 text-center lg:text-left">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl mb-6">
                {{ ucfirst($package_name) }}
            </h1>
            <p class="lead text-xl text-slate-600 dark:text-slate-400 mb-10 max-w-3xl mx-auto lg:mx-0">
                A Laravel package for fuzzy logic systems, classification, and basic ANFIS-style neural training. 
                Build adaptive decision-making, user scoring, and recommendation systems.
            </p>

            <div class="flex  sm:flex-row gap-4 justify-center items-center">
                <x-docs.code-block language="bash" class="max-w-full text-center  flex items-center justify-center">
                        {{ $package->command }}
                </x-docs.code-block>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'usage']) }}" 
                   class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-md hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Get Started with Examples →
                </a>
                <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'installation']) }}" 
                   class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-6 py-3 text-base font-semibold text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-800 transition">
                    Installation Guide
                </a>
            </div>
        </header>

    @elseif($slug === 'installation')
        <h1 class="text-4xl font-bold tracking-tight mb-8">Installation</h1>

        <div class="prose-p:text-lg prose-p:leading-relaxed">
            <p>Install {{ ucfirst($package_name) }} with Composer:</p>
            <x-docs.code-block language="bash" class="my-8">
                composer require scorpion/{{ $package_name }}:{{ $version }}
            </x-docs.code-block>

            <p class="mt-8">Optionally publish the configuration file:</p>
            <x-docs.code-block language="bash" class="my-8">
                php artisan vendor:publish --tag="scorpfuzzy-config"
            </x-docs.code-block>

            <h2 class="text-2xl font-semibold mt-12 mb-6">Requirements</h2>
            <ul class="list-disc pl-6 space-y-2 text-lg">
                <li>Laravel <code>^12.0</code></li>
                <li>PHP <code>^8.2</code></li>
            </ul>
        </div>

    @elseif($slug === 'usage')
        <h1 class="text-4xl font-bold tracking-tight mb-10">Usage</h1>

        <div class="space-y-12">
            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">1. Driver Recognition – Fuzzy Logic Builder</h2>
                <p class="text-lg leading-relaxed">Create a fuzzy logic evaluation chain (e.g. to classify users based on comments & payments):</p>
                <x-docs.code-block language="php" class="my-8">
                    $record1 = Recognizer::DriverRecognition(
                        fuzzyCommand: "Lvl1",
                        RecognizerDirector: function (Fuzzy1Builder $fuzzy1Builder) {
                            $fuzzy1Builder->get_study_input(
                                datas: ["id" => 1, "comments" => 500, "payments" => 400],
                                data1: "comments", data2: "payments", determined_id: "id"
                            );

                            $fuzzy1Builder->makeSystem1();
                            $fuzzy1Builder->makeSystem2();
                            $fuzzy1Builder->makeTable();
                            $fuzzy1Builder->get_study_output();

                            return $fuzzy1Builder;
                        }
                    )->Recognize()->get();
                </x-docs.code-block>
                <p class="mt-6">Print final result:</p>
                <x-docs.code-block language="php" class="my-8">
                    print_r($record1["final_result"]);
                </x-docs.code-block>
            </section>

            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">2. Classification (e.g. customer tiers)</h2>
                <p class="text-lg leading-relaxed">Classify users into tiers based on amount_paid and rating:</p>
                <x-docs.code-block language="php" class="my-8">
                    $apps = [
                        ["user_id" => 2,  "rating" => 5,  "amount_paid" => 3000],
                        ["user_id" => 19, "rating" => 1,  "amount_paid" => 22000],
                        ["user_id" => 22, "rating" => 6,  "amount_paid" => 20000],
                        ["user_id" => 10, "rating" => 10, "amount_paid" => 80000],
                    ];

                    $classifier = Classifier::create(
                        data_primary_key: 'user_id',
                        datas: $apps,
                        classifier1: 'amount_paid',
                        class: 'rating'
                    )->perform(['bronze', 'silver', 'gold', 'Diamond']);

                    print_r($classifier);
                </x-docs.code-block>
            </section>

            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">3. Combining Classification & Fuzzy Logic</h2>
                <x-docs.code-block language="php" class="my-8">
                    $record3 = Recognizer::DriverRecognition(
                        fuzzyCommand: "Lvl2",
                        RecognizerDirector: function (Fuzzy2Builder $fuzzy2Builder) use ($apps) {
                            $classifiers = Classifier::create(
                                data_primary_key: 'user_id',
                                datas: $apps,
                                classifier1: 'amount_paid',
                                class: 'rating'
                            )->perform(['bronze', 'silver', 'gold']);

                            $fuzzy2Builder->ClassifierRate(classifiers: $classifiers);

                            $fuzzy2Builder->get_study_input(
                                datas: $apps2,
                                data1: "downloads",
                                data2: "ratings",
                                determined_id: "user_id"
                            );

                            $fuzzy2Builder->makeSystem1(systemName: "downloads");
                            $fuzzy2Builder->makeSystem2(systemName: "ratings");
                            $fuzzy2Builder->makeTable();
                            $fuzzy2Builder->get_study_output();

                            return $fuzzy2Builder;
                        }
                    )->Recognize()->get();

                    print_r($record3["final_result"]);
                </x-docs.code-block>
            </section>
        </div>

    @elseif($slug === 'anfis')
        <h1 class="text-4xl font-bold tracking-tight mb-10">ANFIS / Neural Training</h1>

        <div class="space-y-12">
            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">Example: Temperature & Humidity Evaluation</h2>
                <x-docs.code-block language="php" class="my-8">
                    $f1 = Recognizer::DriverRecognition(
                        fuzzyCommand: "Lvl1",
                        RecognizerDirector: function (Fuzzy1Builder $builder) {
                            $builder->get_study_input(
                                datas: ["id" => 1, "temp" => 40, "humidity" => 65],
                                data1: "temp", data2: "humidity", determined_id: "id"
                            );

                            $builder->makeSystem1(
                                systemName: "temp",
                                system_info: [
                                    "nice_T"    => [10, 40, 60],
                                    "good_T"    => [20, 30, 40],
                                    "perfect_T" => [40, 50, 90],
                                ]
                            );

                            $builder->makeSystem2(
                                systemName: "humidity",
                                system_info: [
                                    "nice_H"    => [10, 35, 40],
                                    "good_H"    => [15, 35, 40],
                                    "perfect_H" => [60, 65, 68],
                                ]
                            );

                            $builder->makeTable();
                            $builder->get_study_output();

                            return $builder;
                        }
                    )->Recognize()->get();

                    print_r($f1["final_result"]);
                </x-docs.code-block>
            </section>

            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">Training with CSV (future / planned)</h2>
                <x-docs.code-block language="php" class="my-8">
                    $record4 = Recognizer::DriverRecognition(
                        fuzzyCommand: "Lvl3",
                        RecognizerDirector: function (Fuzzy3Builder $fuzzy3Builder) use ($f1) {
                            $fuzzy3Builder->get_study_input(
                                fuzzy_system_info: $f1,
                                neuralType: "back",
                                website_url: "#",
                                "13E6e223DFMe#3EDFD"
                            );

                            $fuzzy3Builder->setConfig(maxEpochs: 5);
                            $fuzzy3Builder->makeTable(module: 'trainingSet.csv');
                            $fuzzy3Builder->get_study_output();

                            return $fuzzy3Builder;
                        }
                    )->Recognize()->get();

                    print_r($record4["final_result"]);
                </x-docs.code-block>
            </section>
        </div>

    @elseif($slug === 'planned')
        <h1 class="text-4xl font-bold tracking-tight mb-10">Planned Features</h1>

        <p class="text-lg mb-12">Here's what's coming next for Scorpfuzzy. These features are in active development or planned for future releases.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-8 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition">
                <h3 class="text-2xl font-semibold mb-4 text-indigo-600 dark:text-indigo-400">Advanced ANFIS Training</h3>
                <p class="text-lg mb-4">Full backpropagation support with CSV/Excel import, model saving, and auto-tuning of membership functions.</p>
                <span class="inline-block px-4 py-1 text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-full">
                    Coming Soon
                </span>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-8 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition">
                <h3 class="text-2xl font-semibold mb-4 text-indigo-600 dark:text-indigo-400">Multi-Layer Fuzzy Systems</h3>
                <p class="text-lg mb-4">Support for hierarchical fuzzy systems with more than two inputs and cascaded rules.</p>
                <span class="inline-block px-4 py-1 text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-full">
                    Coming Soon
                </span>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-8 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition">
                <h3 class="text-2xl font-semibold mb-4 text-indigo-600 dark:text-indigo-400">Laravel Integration Helpers</h3>
                <p class="text-lg mb-4">Eloquent trait for fuzzy scoring, Blade components for decision visualization, and job support.</p>
                <span class="inline-block px-4 py-1 text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-full">
                    Planned
                </span>
            </div>

            <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-8 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md transition">
                <h3 class="text-2xl font-semibold mb-4 text-indigo-600 dark:text-indigo-400">Web UI Dashboard</h3>
                <p class="text-lg mb-4">Livewire-based admin panel to configure fuzzy systems and view training results visually.</p>
                <span class="inline-block px-4 py-1 text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-full">
                    Planned
                </span>
            </div>
        </div>

        <p class="mt-12 text-center text-lg text-slate-600 dark:text-slate-400">
            Want to see something added sooner? 
            <a href="mailto:ali76723201@gmail.com?subject=Scorpfuzzy%20Feature%20Request" 
               class="text-indigo-600 hover:underline">Contact Me!</a>
        </p>

    @elseif($slug === 'concepts')
        <h1 class="text-4xl font-bold tracking-tight mb-10">Core Concepts</h1>

        <div class="space-y-12">
            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">Commands</h2>
                <ul class="list-disc pl-6 space-y-3 text-lg">
                    <li><code>Classification</code> – Scorpion-Classification = fuzzy Classification + K-means Classification "100% accuracy" (free)</li>
                    <li><code>Lvl1</code> – basic two-variable fuzzy system (free)</li>
                    <li><code>Lvl2</code> – classification + fuzzy combination (planned)</li>
                    <li><code>Lvl3</code> – neural training model (planned)</li>
                </ul>
            </section>

            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">Builders</h2>
                <ul class="list-disc pl-6 space-y-3 text-lg">
                    <li><strong>Fuzzy1Builder</strong> – simple 2-input fuzzy logic</li>
                    <li><strong>Fuzzy2Builder</strong> – classification-aware fuzzy</li>
                    <li><strong>Fuzzy3Builder</strong> – ANFIS / neural training</li>
                    <li><strong>Classifier</strong> – simple rule-based classification</li>
                </ul>
            </section>

            <section>
                <h2 class="text-3xl font-bold tracking-tight mb-6">Offers / Discounts</h2>
                <p class="text-lg leading-relaxed">
                    Typical use-case: offer 1.2% discount to all products for users classified as <em>gold</em> or higher.
                </p>
            </section>
        </div>

    @else
        <h1 class="text-4xl font-bold tracking-tight mb-8">Page not found</h1>
        <p class="text-lg mb-8">The requested documentation page does not exist.</p>
        <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'index']) }}" 
           class="inline-flex items-center rounded-lg bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-md hover:bg-indigo-700 transition">
            Back to Documentation Home
        </a>
    @endif

    @if($slug !== 'index' && $slug !== '')
        <footer class="mt-16 pt-10 border-t border-slate-200 dark:border-slate-700">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6 text-base font-medium">
                <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'index']) }}" 
                   class="flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition">
                    ← Back to Overview
                </a>

                @if($slug === 'usage')
                    <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'anfis']) }}" 
                       class="flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition">
                        Next: ANFIS Training →
                    </a>
                @elseif($slug === 'anfis')
                    <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'concepts']) }}" 
                       class="flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition">
                        Next: Core Concepts →
                    </a>
                @elseif($slug === 'concepts')
                    <a href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'planned']) }}" 
                       class="flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition">
                        Next: Planned Features →
                    </a>
                @elseif($slug === 'planned')
                    <span class="text-slate-500 dark:text-slate-400">End of guide</span>
                @endif
            </div>
        </footer>
    @endif
</div>