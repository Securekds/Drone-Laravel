<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card';
import { Tabs, TabsList, TabsTrigger } from '@/components/ui/tabs';
import { Dialog, DialogContent } from '@/components/ui/dialog';
import { Icon } from '@iconify/vue';
import { computed, ref, onMounted, onUnmounted, watch } from 'vue';

interface GalleryItem {
    id: number;
    image: string;
    link: string;
    category: 'all' | 'copter' | 'nature' | 'sea';
    alt?: string;
}

interface Props {
    galleryItems?: GalleryItem[];
}

const props = withDefaults(defineProps<Props>(), {
    galleryItems: () => [
        {
            id: 1,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-01.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-01.jpg',
            category: 'copter',
            alt: 'Gallery Image 1',
        },
        {
            id: 2,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-02.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-02.jpg',
            category: 'nature',
            alt: 'Gallery Image 2',
        },
        {
            id: 3,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-03.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-03.jpg',
            category: 'sea',
            alt: 'Gallery Image 3',
        },
        {
            id: 4,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-04.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-04.jpg',
            category: 'copter',
            alt: 'Gallery Image 4',
        },
        {
            id: 5,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-05.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-05.jpg',
            category: 'nature',
            alt: 'Gallery Image 5',
        },
        {
            id: 6,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-06.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-06.jpg',
            category: 'sea',
            alt: 'Gallery Image 6',
        },
        {
            id: 7,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-07.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-07.jpg',
            category: 'copter',
            alt: 'Gallery Image 7',
        },
        {
            id: 8,
            image: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-08.jpg',
            link: 'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/gallery01_img-08.jpg',
            category: 'nature',
            alt: 'Gallery Image 8',
        },
    ],
});

const activeCategory = ref<string>('all');
const isLightboxOpen = ref(false);
const currentImageIndex = ref(0);

const filteredItems = computed(() => {
    if (activeCategory.value === 'all') {
        return props.galleryItems;
    }
    return props.galleryItems.filter(
        (item) => item.category === activeCategory.value,
    );
});

const currentImage = computed(() => {
    return filteredItems.value[currentImageIndex.value];
});

const openLightbox = (index: number) => {
    // Ensure index is within bounds
    const safeIndex = Math.max(0, Math.min(index, filteredItems.value.length - 1));
    currentImageIndex.value = safeIndex;
    isLightboxOpen.value = true;
};

const closeLightbox = () => {
    isLightboxOpen.value = false;
};

const nextImage = () => {
    if (currentImageIndex.value < filteredItems.value.length - 1) {
        currentImageIndex.value++;
    } else {
        currentImageIndex.value = 0; // Loop to first image
    }
};

const previousImage = () => {
    if (currentImageIndex.value > 0) {
        currentImageIndex.value--;
    } else {
        currentImageIndex.value = filteredItems.value.length - 1; // Loop to last image
    }
};

const handleKeyDown = (event: KeyboardEvent) => {
    if (!isLightboxOpen.value) return;
    
    if (event.key === 'ArrowRight') {
        event.preventDefault();
        nextImage();
    } else if (event.key === 'ArrowLeft') {
        event.preventDefault();
        previousImage();
    } else if (event.key === 'Escape') {
        event.preventDefault();
        closeLightbox();
    }
};

onMounted(() => {
    window.addEventListener('keydown', handleKeyDown);
});

onUnmounted(() => {
    window.removeEventListener('keydown', handleKeyDown);
});

// Reset image index when filter changes
watch(activeCategory, () => {
    if (isLightboxOpen.value) {
        currentImageIndex.value = 0;
    }
});
</script>

<template>
    <section
        class="font-roboto pt-24 pb-28 text-lg text-zinc-500 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40"
    >
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Gallery Section -->
                    <div class="mt-16 w-full px-4 md:mt-20">
                        <!-- Filter Tabs -->
                        <Card class="border-0 bg-transparent shadow-none">
                            <CardContent class="p-0">
                                <Tabs v-model="activeCategory" class="w-full">
                                    <TabsList
                                        class="flex w-full justify-start space-x-0 border-0 bg-transparent p-0 shadow-none"
                                    >
                                        <TabsTrigger
                                            value="all"
                                            class="mx-3 border-0 bg-transparent p-1.5 text-sm font-bold shadow-none transition-colors duration-200 hover:text-indigo-900 data-[state=active]:text-indigo-900 data-[state=inactive]:text-slate-400"
                                        >
                                            ALL
                                        </TabsTrigger>
                                        <TabsTrigger
                                            value="copter"
                                            class="mx-3 border-0 bg-transparent p-1.5 text-sm font-bold shadow-none transition-colors duration-200 hover:text-indigo-900 data-[state=active]:text-indigo-900 data-[state=inactive]:text-slate-400"
                                        >
                                            COPTER
                                        </TabsTrigger>
                                        <TabsTrigger
                                            value="nature"
                                            class="mx-3 border-0 bg-transparent p-1.5 text-sm font-bold shadow-none transition-colors duration-200 hover:text-indigo-900 data-[state=active]:text-indigo-900 data-[state=inactive]:text-slate-400"
                                        >
                                            NATURE
                                        </TabsTrigger>
                                        <TabsTrigger
                                            value="sea"
                                            class="mx-3 border-0 bg-transparent p-1.5 text-sm font-bold shadow-none transition-colors duration-200 hover:text-indigo-900 data-[state=active]:text-indigo-900 data-[state=inactive]:text-slate-400"
                                        >
                                            SEA
                                        </TabsTrigger>
                                    </TabsList>
                                </Tabs>
                            </CardContent>
                        </Card>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid - No Vertical or Horizontal Gaps -->
        <div class="m-0 flex flex-wrap p-0">
            <div
                v-for="item in filteredItems"
                :key="item.id"
                class="m-0 w-full p-0 min-[576px]:w-1/2 min-[992px]:w-1/4 md:w-1/3"
            >
                <Card
                    class="group m-0 cursor-pointer overflow-hidden border-0 bg-transparent p-0 shadow-none rounded-none"
                >
                    <CardContent class="m-0 p-0">
                        <div
                            @click="openLightbox(filteredItems.indexOf(item))"
                            class="relative m-0 block overflow-hidden p-0 transition-all duration-300 cursor-pointer"
                        >
                            <figure
                                class="m-0 w-full overflow-hidden p-0"
                            >
                                <img
                                    :src="item.image"
                                    :alt="item.alt"
                                    class="block h-auto w-full align-top transition-none"
                                />
                                <!-- Hover Overlay -->
                                <div
                                    class="absolute top-0 left-0 flex h-full w-full flex-col items-end justify-end bg-indigo-900/80 p-8 opacity-0 transition-all duration-300 group-hover:opacity-100"
                                >
                                    <div
                                        class="w-full font-bold text-white"
                                    >
                                        {{
                                            item.category.toUpperCase()
                                        }}
                                    </div>
                                    <h4
                                        class="mt-3 mb-2 w-full text-[1.625rem] leading-8 font-bold text-white"
                                    >
                                        {{ item.alt }}
                                    </h4>
                                </div>
                            </figure>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>

        <!-- Lightbox Dialog -->
        <Dialog v-model:open="isLightboxOpen">
            <DialogContent
                class="max-w-7xl w-full h-[90vh] p-0 bg-black/95 border-0 rounded-none"
            >
                <div class="relative flex items-center justify-center w-full h-full">
                    <!-- Previous Button -->
                    <button
                        v-if="filteredItems.length > 1"
                        @click="previousImage"
                        class="absolute left-4 z-10 flex items-center justify-center w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full transition-all duration-200 group"
                        aria-label="Previous image"
                    >
                        <Icon
                            icon="heroicons:arrow-left"
                            class="w-6 h-6 text-white group-hover:text-white transition-colors duration-200"
                        />
                    </button>

                    <!-- Image Container -->
                    <div class="flex flex-col items-center justify-center w-full h-full p-8">
                        <img
                            v-if="currentImage"
                            :src="currentImage.image"
                            :alt="currentImage.alt"
                            class="max-w-full max-h-full object-contain"
                        />
                        <!-- Image Info -->
                        <div
                            v-if="currentImage"
                            class="mt-6 text-center text-white"
                        >
                            <div class="text-sm font-bold mb-2 uppercase tracking-wider">
                                {{ currentImage.category }}
                            </div>
                            <h3 class="text-2xl font-bold">
                                {{ currentImage.alt }}
                            </h3>
                            <div class="text-sm mt-2 text-white/70">
                                {{ currentImageIndex + 1 }} / {{ filteredItems.length }}
                            </div>
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button
                        v-if="filteredItems.length > 1"
                        @click="nextImage"
                        class="absolute right-4 z-10 flex items-center justify-center w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full transition-all duration-200 group"
                        aria-label="Next image"
                    >
                        <Icon
                            icon="heroicons:arrow-right"
                            class="w-6 h-6 text-white group-hover:text-white transition-colors duration-200"
                        />
                    </button>
                </div>
            </DialogContent>
        </Dialog>
    </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');
.font-roboto {
    font-family: 'Roboto', sans-serif;
}
</style>
