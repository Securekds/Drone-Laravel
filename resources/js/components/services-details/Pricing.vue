<script setup lang="ts">
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Icon } from '@iconify/vue'

interface PricingFeature {
  id: number
  text: string
}

interface PricingPlan {
  id: number
  title: string
  iconImage: string
  price: string
  features: PricingFeature[]
  ctaText: string
  ctaLink: string
}

interface SectionData {
  subtitle: string
  title: string
}

interface Props {
  sectionData?: SectionData
  plans?: PricingPlan[]
  backgroundPattern?: string
}

const props = withDefaults(defineProps<Props>(), {
  sectionData: () => ({
    subtitle: "Pricing Tables",
    title: "Awesome Pricing Plan"
  }),
  backgroundPattern: "/assets/92.jpeg",
  plans: () => [
    {
      id: 1,
      title: "Personal",
      iconImage: "/assets/pricing-icon-1.svg",
      price: "Free",
      features: [
        { id: 1, text: "Occaecat cupidatat" },
        { id: 2, text: "Officiadese runt mollit" },
        { id: 3, text: "Lanim id est laborum." },
        { id: 4, text: "Anim id est laborum." }
      ],
      ctaText: "GET STARTED",
      ctaLink: "#"
    },
    {
      id: 2,
      title: "Small team",
      iconImage: "/assets/pricing-icon-2.svg",
      price: "$100.00",
      features: [
        { id: 1, text: "Occaecat cupidatat" },
        { id: 2, text: "Officiadese runt mollit" },
        { id: 3, text: "Lanim id est laborum." },
        { id: 4, text: "Anim id est laborum." }
      ],
      ctaText: "GET STARTED",
      ctaLink: "#"
    },
    {
      id: 3,
      title: "Enterprise",
      iconImage: "/assets/pricing-icon-3.svg",
      price: "$700.00",
      features: [
        { id: 1, text: "Occaecat cupidatat" },
        { id: 2, text: "Officiadese runt mollit" },
        { id: 3, text: "Lanim id est laborum." },
        { id: 4, text: "Anim id est laborum." }
      ],
      ctaText: "GET STARTED",
      ctaLink: "#"
    }
  ]
})
</script>

<template>
  <section class="relative font-roboto pt-[98px] pb-[100px] sm:pt-[148px] sm:pb-[130px] xl:pb-[129px] w-full overflow-hidden bg-[url(/assets/92.jpeg)] bg-repeat-x bg-left-top bg-[length:auto_424px]">
    <div class="w-full mx-auto px-[19px] max-w-none lg:px-[25px] xl:px-[15px] xl:max-w-[1200px]">
      <!-- Header Section -->
      <div class="w-full relative box-border pb-[44px] text-center mb-0">
        <div class="p-0 relative font-bold box-border leading-[1.1] ![margin-top:0] text-[14px] tracking-[-0.03em] text-[oklch(37.754%0.15587_274.67)] lg:text-[16px]">
          {{ sectionData.subtitle }}
        </div>
        <h1 class="mb-0 pb-0 font-bold mt-[20px] box-border -tracking-wide leading-[1.13] [word-spacing:0] text-[31px] text-[oklch(24.229%0.02848_284.07)] lg:text-[40px]">
          {{ sectionData.title }}
        </h1>
      </div>

      <!-- Pricing Cards -->
      <div class="flex flex-wrap -mx-[10px] px-4 sm:px-0">
        <Card
          v-for="plan in plans"
          :key="plan.id"
          class="group relative w-full md:w-6/12 xl:w-[33.333%] px-[10px] mb-[30px] md:mb-0 xl:mb-0 border-0 shadow-none p-0 gap-0 md:px-[15px] xl:px-[15px]"
        >
          <CardContent class="delay-0 pt-[100px] pb-[85px] px-[35px] sm:px-[40px] box-border text-center ease-linear duration-[0.2s] transition-all bg-white shadow-[3px_0_70px_oklch(82.997%0.00138_286.37/0.29)] hover:bg-[oklch(37.754%0.15587_274.67)] xl:pt-[80px] xl:pb-[65px] xl:px-[75px] p-0 sm:pt-[80px] sm:pb-[65px]">
            <!-- Icon -->
            <div class="pt-[20px] pb-[85px] sm:pt-0 box-border flex justify-center">
              <img 
                :src="plan.iconImage" 
                :alt="plan.title"
                class="icon-filter delay-0 h-[110px] w-[110px] box-border ease-linear align-middle overflow-hidden duration-[0.2s] transition-all object-contain"
              />
            </div>

            <!-- Plan Title -->
            <div class="font-bold pb-[31px] box-border leading-[1.3] text-[26px] text-[oklch(24.229%0.02848_284.07)] group-hover:text-white">
              {{ plan.title }}
            </div>

            <!-- Features List -->
            <div class="box-border text-center lg:text-left">
              <ul class="m-0 p-0 box-border list-none">
                <li 
                  v-for="feature in plan.features"
                  :key="feature.id"
                  class="px-0 delay-0 relative py-[13px] box-border ease-linear transition-all duration-[0.2s] text-[15px] text-[oklch(63.009%0_none)] group-hover:text-white border-b border-[oklch(94.912%0_none)] lg:pr-0 lg:pl-[45px] lg:pt-[14px] lg:pb-[13px]"
                >
                  <span class="delay-0 absolute box-border top-[14px] ease-linear left-[45px] duration-[0.2s] transition-all fill-[oklch(37.754%0.15587_274.67)] text-[oklch(37.754%0.15587_274.67)] group-hover:fill-white group-hover:text-white lg:left-[14px]">
                    <Icon icon="mdi:check" class="h-[17px] w-[17px] box-border align-middle overflow-hidden" />
                  </span>
                  {{ feature.text }}
                </li>
              </ul>
            </div>

            <!-- Price -->
            <div class="delay-0 mt-[35px] box-border font-light ease-linear leading-[1.3] duration-[0.2s] text-[40px] transition-all text-[oklch(37.754%0.15587_274.67)] group-hover:text-white lg:mt-[14px]">
              {{ plan.price }}
            </div>

<!-- CTA Button -->
<div class="group inline-block mt-[38px] mb-[30px] sm:mb-0">
  <a 
    :href="plan.ctaLink" 
    class="delay-0 font-bold px-[25px] py-[19px] box-border shadow-none ease-linear inline-flex items-center justify-center leading-[1.3] min-w-[195px] rounded-[29px] duration-[0.2s] text-[16px] transition-all text-[oklch(37.754%0.15587_274.67)] bg-transparent border border-[oklch(78.305%0.03667_289.05)] hover:tracking-[0.04em] no-underline hover:text-white hover:border-white"
  >
    {{ plan.ctaText }}
  </a>
</div>
          </CardContent>
        </Card>
      </div>
    </div>
  </section>
</template>

<style>

.icon-filter {
  filter: brightness(0) saturate(100%) invert(18%) sepia(89%) saturate(2378%) hue-rotate(228deg) brightness(98%) contrast(95%);
}

.group:hover .icon-filter {
  filter: brightness(0) invert(1);
}
</style>

