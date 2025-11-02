<script setup lang="ts">
import HomeSlider from '@/components/home/HomeSlider.vue';
import Services from '@/components/home/Services.vue';
import Additional from '@/components/home/Additional.vue';
import Cases from '@/components/home/Cases.vue';
import Innovations from '@/components/home/Innovations.vue';
import PricingPlans from '@/components/home/PricingPlans.vue';
import Breakthroughs from '@/components/home/Breakthroughs.vue';
import Testimonials from '@/components/home/Testimonials.vue';
import BlogSection from '@/components/home/BlogSection.vue';
import LastBlueSection from '@/components/home/LastBlueSection.vue';
import { onMounted } from 'vue';
import { useAppearance } from '@/composables/useAppearance';



onMounted(() => {
    const ap = useAppearance()
    ap.updateAppearance('light')
});
</script>

<template>
    <div class="w-full relative">
        <HomeSlider />
        <Services />
        <Additional />
        <Innovations />
        <PricingPlans />
        <Cases />
        <Breakthroughs />
        <Testimonials />
        <BlogSection />
        <LastBlueSection />
    </div>
</template>
