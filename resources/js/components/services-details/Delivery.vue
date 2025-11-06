<script setup lang="ts">
interface Props {
    title?: string;
    highlightText?: string;
    description1?: string;
    description2?: string;
    imageUrl?: string;
    imageAlt?: string;
}

const props = withDefaults(defineProps<Props>(), {
    title: 'Delivery Products <br />for all Different Goals <br />of Life and Business.',
    highlightText:
        'Antarctic icefish spotted dogfish; Red whalefish cherry salmon, jewfish conger eel turbot sailfin silverside. Sea chub longfin smelt dace sleeper shark bottlenose anglerfish torpedo, gray reef shark queen danio needlefish.',
    description1:
        "Deep sea smelt bigscale neon tetra codling snake eel. Humuhumunukunukuapua'a gulf menhaden Red salmon, Asiatic glassfish luderick Bombay duck flabby whalefish spiderfish bull shark boxfishlungfish flathead.",
    description2:
        "danio needlefish. Deep sea smelt bigscale neon tetra codling snake eel. Humuhumunukunukuapua'a gulf menhaden Red salmon, Asiatic glassfish luderick Bombay duck flabby whalefish spiderfish bull shark boxfish–lungfish flathead. North American darter.Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine. Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefis.",
    imageUrl: '/images/services/delivery.svg',
    imageAlt: 'Delivery Icon',
});
</script>

<template>
    <section
        class="font-roboto pt-32 text-lg text-zinc-500 min-[576px]:pt-44 min-[1025px]:pt-44"
    >
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Main Content Row -->
                    <div class="mt-16 w-full px-4 md:mt-20">
                        <div
                            class="flex flex-col lg:flex-row lg:items-start lg:justify-between"
                        >
                            <!-- Left Side - Title and Icon -->
                            <div class="mb-8 lg:mb-0 lg:w-1/3">
                                <div class="flex flex-col">
                                    <!-- Title -->
                                    <div
                                        class="mb-8 text-[2rem] leading-none font-bold text-zinc-800 sm:text-[2.5rem] md:text-[3rem]"
                                    >
                                        <h4 v-html="title"></h4>
                                    </div>

                                    <!-- Icon -->
                                    <div class="text-left text-indigo-900">
                                        <img
                                            :src="imageUrl"
                                            :alt="imageAlt"
                                            class="inline-block h-24 w-24 object-contain"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Text Content -->
                            <div class="lg:w-2/3 lg:pl-12">
                                <div class="flex flex-col">
                                    <!-- Highlight Text -->
                                    <div class="mb-6 font-bold text-zinc-800">
                                        <p class="text-lg leading-relaxed">
                                            <strong>{{ highlightText }}</strong>
                                        </p>
                                    </div>

                                    <!-- Description 1 -->
                                    <div class="mb-6">
                                        <p class="leading-relaxed">
                                            {{ description1 }}
                                        </p>
                                    </div>

                                    <!-- Description 2 -->
                                    <div>
                                        <p class="leading-relaxed">
                                            {{ description2 }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

