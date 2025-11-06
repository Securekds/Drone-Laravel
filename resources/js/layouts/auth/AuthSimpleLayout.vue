<script setup lang="ts">
import AppLogoIcon from '@/components/kit/AppLogoIcon.vue';
import { home } from '@/routes';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36" style="background-image: url('/assets/sectionbg_wrapper-03.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex min-h-svh flex-col items-center justify-center gap-6">
                <div class="w-full max-w-sm">
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col items-center gap-4">
                            <Link
                                :href="home()"
                                class="flex flex-col items-center gap-2 font-medium"
                            >
                                <div
                                    class="mb-1 flex h-9 w-9 items-center justify-center rounded-md"
                                >
                                    <AppLogoIcon
                                        class="size-9 fill-current text-[var(--foreground)] dark:text-white"
                                    />
                                </div>
                                <span class="sr-only">{{ title }}</span>
                            </Link>
                            <div class="space-y-2 text-center">
                                <h1 class="text-xl font-medium">{{ title }}</h1>
                                <p class="text-center text-sm text-muted-foreground">
                                    {{ description }}
                                </p>
                            </div>
                        </div>
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
