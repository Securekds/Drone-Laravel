<script setup lang="ts">
import HomeSlider from '@/components/home/HomeSlider.vue';
import Services from '@/components/home/Services.vue';
import Additional from '@/components/home/Additional.vue';
import { onMounted } from 'vue';
import { useAppearance } from '@/composables/useAppearance';



onMounted(() => {
    const ap = useAppearance()
    ap.updateAppearance('light')
});
</script>

<template>
    <div>
        <HomeSlider />
         <Services />
         <Additional />
    </div>
</template>
