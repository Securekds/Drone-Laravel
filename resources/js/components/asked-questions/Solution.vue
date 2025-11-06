<script setup lang="ts">
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from '@/components/ui/accordion'
import { Button } from '@/components/ui/button'

interface FAQItem {
  id: string
  question: string
  answer: string
}

interface Props {
  title?: string
  faqs?: FAQItem[]
  ctaTitle?: string
  ctaButtonText?: string
  ctaButtonLink?: string
}

const props = withDefaults(defineProps<Props>(), {
  title: 'Got stuck? Try to find a solution here.',
  faqs: () => [
    {
      id: '1',
      question: 'What is the best drone?',
      answer: 'Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.'
    },
    {
      id: '2',
      question: 'I\'ve never flown a drone before, which drone should I buy?',
      answer: 'Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu.'
    },
    {
      id: '3',
      question: 'Is it difficult to fly a drone?',
      answer: 'Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass. Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury.'
    },
    {
      id: '4',
      question: 'What kind of regulations are there to fly a drone?',
      answer: 'Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish.'
    },
    {
      id: '5',
      question: 'Wait, I have to register my drone and provide my physical address and information?',
      answer: 'Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine. Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.'
    }
  ],
  ctaTitle: 'Didn\'t find your question? Contact us anytime',
  ctaButtonText: 'CONTACT US',
  ctaButtonLink: '*'
})
</script>

<template>
  <section class="text-zinc-500 text-lg pb-28 pt-24 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- FAQ Section -->
          <div class="w-full px-4 mt-16 md:mt-20">
            <!-- Title -->
            <div class="pb-6 text-[1.8rem] sm:text-[2.50rem] leading-none text-zinc-800 font-bold">
              <h3>{{ title }}</h3>
            </div>

          <!-- FAQ Accordion -->
             <div class="min-[1025px]:pt-6 min-[1025px]:pr-9 min-[1025px]:pb-1 min-[1025px]:pl-0 mb-16">
              <Accordion type="single" collapsible class="w-full text-left">
    <AccordionItem
      v-for="faq in faqs"
      :key="faq.id"
      :value="faq.id"
      class="border-b-2 border-slate-300 text-left"
    >
      <AccordionTrigger
        class="text-[1.60rem] sm:text-[1.63rem] leading-8 text-zinc-800 font-bold py-6 px-4 min-[1025px]:px-7 hover:no-underline hover:bg-slate-50 transition-colors duration-200 text-left"
      >
        {{ faq.question }}
      </AccordionTrigger>
      <AccordionContent
        class="text-zinc-500 text-lg px-4 min-[1025px]:px-7 pb-6 pt-3 text-left"
      >
        <p>{{ faq.answer }}</p>
      </AccordionContent>
    </AccordionItem>
              </Accordion>
              </div>


            <!-- Contact CTA Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between bg-white p-4 rounded-lg">
              <!-- Text Section - 66.666% -->
              <div class="md:w-2/3 mb-6 md:mb-0">
                <div class="text-[1.63rem] leading-8 text-zinc-800 font-bold">
                  <h4>{{ ctaTitle }}</h4>
                </div>
              </div>

              <!-- Button Section - 33.333% -->
              <div class="md:w-1/3 flex justify-start md:justify-end">
                <Button
                  as-child
                  class="bg-indigo-900 text-white hover:bg-indigo-800 font-bold py-6 px-8 rounded-3xl border-2 border-indigo-900 transition-all duration-300"
                >
                  <a :href="ctaButtonLink" class="no-underline">
                    {{ ctaButtonText }}
                  </a>
                </Button>
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