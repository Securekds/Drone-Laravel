<script setup lang="ts">
import AppContent from '@/components/kit/AppContent.vue';
import AppHeader from '@/components/kit/AppHeader.vue';
import AppShell from '@/components/kit/AppShell.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell class="flex-col">
        <AppHeader :breadcrumbs="breadcrumbs" />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
