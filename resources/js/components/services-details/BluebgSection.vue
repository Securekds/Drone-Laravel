<script setup lang="ts">
import { Icon } from '@iconify/vue';

interface FeatureItem {
    id: number;
    icon: string;
    title: string;
    description: string;
    listItems: string[];
}

interface Props {
    backgroundImage?: string;
    features?: FeatureItem[];
}

const props = withDefaults(defineProps<Props>(), {
    backgroundImage:
        "url('/assets/sectionbg_wrapper-04.jpg')",
    features: () => [
        {
            id: 1,
            icon: '/assets/imageon.png',
            title: 'Strong Franchise <br />Agreement',
            description:
                'Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside.',
            listItems: [
                'Amberjack emperor. Pelagic',
                'Relationship dialog forum',
                'Gulper cuchia cow shark pollyfish',
            ],
        },
        {
            id: 2,
            icon: '/assets/imagelist.png',
            title: 'Important Creteria <br />for Single Service',
            description:
                'Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef',
            listItems: [
                'Amberjack emperor. Pelagic',
                'Relationship dialog forum',
                'Gulper cuchia cow shark pollyfish',
            ],
        },
        {
            id: 3,
            icon: '/assets/imagelast.png',
            title: 'Culture of the Franchise <br />Quadron System',
            description:
                'Blue catfish, plunderfish atka mackerel skipping goby zebra loach',
            listItems: [
                'Amberjack emperor. Pelagic',
                'Relationship dialog forum',
                'Gulper cuchia cow shark pollyfish',
            ],
        },
    ],
});
</script>

<template>
    <section
        class="font-roboto pt-24 pb-28 text-lg text-zinc-500 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40"
        :style="{ backgroundImage }"
    >
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Feature Cards -->
                    <div
                        v-for="feature in features"
                        :key="feature.id"
                        class="mt-16 w-full px-4 md:mt-20 md:w-1/3"
                    >
                        <div
                            class="flex flex-col items-start p-4 text-left text-white"
                        >
                            <!-- Icon -->
                            <div class="mb-6">
                                <img
                                    :src="feature.icon"
                                    :alt="feature.title"
                                    class="h-10 w-10 object-contain"
                                />
                            </div>

                            <!-- Title -->
                            <div
                                class="mb-4 text-[1.63rem] leading-8 font-bold"
                            >
                                <h4 v-html="feature.title"></h4>
                            </div>

                            <!-- Description -->
                            <div class="mb-6">
                                <p>{{ feature.description }}</p>
                            </div>

                            <!-- List Items -->
                            <div class="w-full">
                                <ul class="-mt-1 -mb-3 list-none">
                                    <li
                                        v-for="(
                                            item, index
                                        ) in feature.listItems"
                                        :key="index"
                                        class="relative list-item py-3 pl-9 min-[1025px]:pl-12"
                                    >
                                        <!-- Custom circle marker -->
                                        <div
                                            class="absolute top-4 left-0 flex h-[21px] w-[21px] items-center justify-center rounded-full border border-white"
                                        >
                                            <Icon
                                                icon="heroicons:check"
                                                class="h-3 w-3 text-white"
                                            />
                                        </div>
                                        {{ item }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');
.font-roboto {
    font-family: 'Roboto', sans-serif;
}
</style>
