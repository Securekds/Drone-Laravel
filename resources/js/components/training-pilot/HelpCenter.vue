<script setup lang="ts">
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from '@/components/ui/accordion'
import { Card, CardContent } from '@/components/ui/card'

interface FAQItem {
  id: string
  question: string
  answer: string
}

interface Props {
  subtitle?: string
  title?: string
  faqs?: FAQItem[]
}

const props = withDefaults(defineProps<Props>(), {
  subtitle: 'Help Center',
  title: 'Frequently Asked Questions',
  faqs: () => [
    {
      id: '1',
      question: 'What is the best drone?',
      answer: 'Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine. Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.'
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
  ]
})
</script>

<template>
<section class="text-zinc-500 text-lg pb-0 pt-24 min-[576px]:pt-36 min-[1025px]:pt-36 font-roboto">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div class="-mt-16 md:-mt-20">
        <div class="flex flex-wrap -m-3.5">
          <!-- Header Section -->
          <div class="w-full px-4 mt-16 md:mt-20">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0">
                <div class="pb-6 font-bold text-center">
                  <div class="text-indigo-900">
                    <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subtitle }}
                  </div>
                  <h3 class="text-zinc-800 text-[2.50rem] leading-none mt-5">
                    {{ title }}
                  </h3>
                </div>
              </CardContent>
            </Card>
          </div>

          <!-- FAQ Accordion -->
          <div class="w-full px-4 mt-8">
            <Card class="border-0 shadow-none bg-transparent">
              <CardContent class="p-0">
                <Accordion type="single" collapsible class="w-full">
                  <AccordionItem
                    v-for="faq in faqs"
                    :key="faq.id"
                    :value="faq.id"
                    class="border-b-2 border-slate-300"
                  >
                    <AccordionTrigger class="text-[1.63rem] leading-8 text-zinc-800 font-bold py-6 px-4 min-[1025px]:px-7 hover:no-underline hover:bg-slate-50 transition-colors duration-200">
                      {{ faq.question }}
                    </AccordionTrigger>
                    <AccordionContent class="text-zinc-500 text-lg px-4 min-[1025px]:px-7 pb-6 pt-3">
                      <p>{{ faq.answer }}</p>
                    </AccordionContent>
                  </AccordionItem>
                </Accordion>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
