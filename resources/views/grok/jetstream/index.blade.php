<x-grok::grok_page_layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jetstream
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <x-jet-label>Label</x-jet-label>
                    <hr>
                    <x-jet-button type="submit">A Button</x-jet-button>
                    <x-jet-danger-button type="submit">A Danger Button</x-jet-danger-button>
                    <x-jet-secondary-button type="submit">A Secondary Button</x-jet-secondary-button>
                    <hr>

                    <x-jet-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                Dropdown
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-jet-dropdown-link href="/user/profile">
                                Profile
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="/user/profile">
                                Something else
                            </x-jet-dropdown-link>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                A Section
                            </div>
                            <x-jet-dropdown-link href="/">
                                Home
                            </x-jet-dropdown-link>
                            <x-jet-dropdown-link href="/">
                                Work
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>

                    <hr>
                    <x-jet-section-title title="Section Title as Attribute"
                                         description="a pure test body: It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."></x-jet-section-title>
                    <hr>
                    <x-jet-section-title>
                        <x-slot name="title">Title <span class="bg-red-200">as named slot</span></x-slot>
                        <x-slot name="description">The description is here as a named slot. It can be <span
                                class="text-2xl">html</span></x-slot>
                    </x-jet-section-title>
                    <x-jet-section-border/>
                    ^ A section border, which is like a horizontal rule or section break
                    <x-jet-section-border/>
                    <x-jet-nav-link href="/">Nav Link</x-jet-nav-link>
                    <x-jet-nav-link href="/">Another Link</x-jet-nav-link>
                    <x-jet-nav-link href="/">Home</x-jet-nav-link>
                    @php
                    $sample =<<<EOD
                     <x-jet-nav-link href="/grok" :active="request()->routeIs('grok*')">
                        Grok
                    </x-jet-nav-link>
                    EOD;
                    $sampleEscaped =  htmlspecialchars($sample);
                    @endphp
                    <pre><code class="language-php">{!!  $sampleEscaped !!}</code></pre>

                    And, in routes/web.php something like this, but more relevant to your site...
                    <x-grok::tas-sample-from-file language="php" path="vendor/eleganttechnologies/grok/src/routes.php"/>

                    <hr>
                    <x-jet-responsive-nav-link href="/">responsive-Nav Link</x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/">responsive-Another Link</x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="/">responsive-Home</x-jet-responsive-nav-link>


                    <x-jet-section-border/>

                    <x-grok::action-section title="Logo stuff">
                        <x-slot name="description">
                            @include('tassygrokjetui::grok.jetstream.logo.description')
                        </x-slot>

                        <x-slot name="content">
                            @include('tassygrokjetui::grok.jetstream.logo.content')
                        </x-slot>
                    </x-grok::action-section>

                    <x-jet-section-border/>

                    <x-grok::action-section title="Titles">
                        <x-slot name="description">
                            @include('tassygrokjetui::grok.jetstream.title.description')
                        </x-slot>

                        <x-slot name="content">
                            @include('tassygrokjetui::grok.jetstream.title.content')
                        </x-slot>
                    </x-grok::action-section>





                </div>
            </div>
        </div>
    </div>

    <x-jet-section-border/>
    x-jet-authentication-card
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>
        Slot
    </x-jet-authentication-card>
    <x-jet-section-border/>


</x-grok::grok_page_layout>
