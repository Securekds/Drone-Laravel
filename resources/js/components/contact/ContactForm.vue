<script setup lang="ts">
import { ref, reactive } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { 
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
import { Loader2 } from 'lucide-vue-next'

// Define interfaces
interface IndustryOption {
  value: string
  label: string
}

interface FormData {
  firstName: string
  lastName: string
  email: string
  industry: string
  message: string
}

interface LocationData {
  address: string
  phone: string
  email: string
  mapUrl: string
}

interface Props {
  sectionLabel?: string
  title?: string
  firstNameLabel?: string
  lastNameLabel?: string
  emailLabel?: string
  industryLabel?: string
  industryPlaceholder?: string
  messageLabel?: string
  submitButtonText?: string
  sendingText?: string
  requiredFieldsNote?: string
  industryOptions?: IndustryOption[]
  locations?: LocationData[]
  showMaps?: boolean
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  sectionLabel: 'Contact Form',
  title: 'Please use the Form',
  firstNameLabel: 'First name',
  lastNameLabel: 'Last name',
  emailLabel: 'Email',
  industryLabel: 'Industry',
  industryPlaceholder: 'Please select',
  messageLabel: 'Message',
  submitButtonText: 'SEND MESSAGE',
  sendingText: 'Sending...',
  requiredFieldsNote: '* – fields are required',
  industryOptions: () => [
    { value: 'technology', label: 'Technology' },
    { value: 'healthcare', label: 'Healthcare' },
    { value: 'education', label: 'Education' },
    { value: 'finance', label: 'Finance' },
    { value: 'manufacturing', label: 'Manufacturing' },
    { value: 'retail', label: 'Retail' },
    { value: 'other', label: 'Other' }
  ],
  showMaps: true,
  locations: () => [
    {
      address: '4706 Skillman Ave,<br />Long Island City, NY 1110',
      phone: '(212) 696-5269',
      email: 'support@quadron.com',
      mapUrl: 'https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near'
    },
    {
      address: '315 S Peoria St<br />Chicago, IL 60607',
      phone: '(212) 667-4369',
      email: 'sale@quadron.com',
      mapUrl: 'https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near'
    }
  ]
})

// Reactive form data
const formData = reactive<FormData>({
  firstName: '',
  lastName: '',
  email: '',
  industry: '',
  message: ''
})

const errors = reactive<Partial<Record<keyof FormData, string>>>({})
const loading = ref(false)
const successMessage = ref('')

// Validation function
const validateForm = (): boolean => {
  let isValid = true
  
  // Clear previous errors
  Object.keys(errors).forEach(key => {
    errors[key as keyof FormData] = ''
  })

  // First name validation
  if (!formData.firstName.trim()) {
    errors.firstName = 'First name is required'
    isValid = false
  }

  // Last name validation
  if (!formData.lastName.trim()) {
    errors.lastName = 'Last name is required'
    isValid = false
  }

  // Email validation
  if (formData.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email)) {
    errors.email = 'Please enter a valid email address'
    isValid = false
  }

  // Industry validation
  if (!formData.industry) {
    errors.industry = 'Industry is required'
    isValid = false
  }

  return isValid
}

// Form submission handler
const handleSubmit = async () => {
  if (!validateForm()) {
    return
  }

  loading.value = true
  successMessage.value = ''

  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 2000))
    
    // Handle successful submission
    console.log('Form submitted:', formData)
    successMessage.value = 'Thank you for your message! We will get back to you soon.'
    
    // Reset form
    Object.keys(formData).forEach(key => {
      formData[key as keyof FormData] = ''
    })
    
  } catch (error) {
    console.error('Error submitting form:', error)
    successMessage.value = 'Sorry, there was an error sending your message. Please try again.'
  } finally {
    loading.value = false
  }
}
</script>


<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36 bg-white">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <!-- Section Header -->
      <div class="pb-11 font-bold min-[791px]:pb-6">
        <div class="text-indigo-900 flex items-center">
          <div class="w-8 h-0.5 bg-indigo-900 mr-6"></div>
          <span>{{ sectionLabel }}</span>
        </div>
        <h4 class="text-zinc-800 text-[2.50rem] leading-none mt-5 min-[791px]:mt-5">
          {{ title }}
        </h4>
      </div>

      <!-- Contact Form -->
      <form @submit.prevent="handleSubmit" class="space-y-8">
        <div class="flex flex-col lg:flex-row gap-8">
          
          <!-- Left Column - Personal Info -->
          <div class="w-full lg:w-1/3 space-y-6">
            
            <!-- First Name -->
            <div class="space-y-2">
              <Label for="firstName" class="font-medium text-base">
                {{ firstNameLabel }} <span class="text-red-500">*</span>
              </Label>
              <Input
                id="firstName"
                v-model="formData.firstName"
                type="text"
                required
                class="h-16 px-6 border-2 border-neutral-300"
                :class="{ 'border-red-500': errors.firstName }"
              />
              <p v-if="errors.firstName" class="text-red-500 text-sm">
                {{ errors.firstName }}
              </p>
            </div>

            <!-- Last Name -->
            <div class="space-y-2">
              <Label for="lastName" class="font-medium text-base">
                {{ lastNameLabel }} <span class="text-red-500">*</span>
              </Label>
              <Input
                id="lastName"
                v-model="formData.lastName"
                type="text"
                required
                class="h-16 px-6 border-2 border-neutral-300"
                :class="{ 'border-red-500': errors.lastName }"
              />
              <p v-if="errors.lastName" class="text-red-500 text-sm">
                {{ errors.lastName }}
              </p>
            </div>

            <!-- Email -->
            <div class="space-y-2">
              <Label for="email" class="font-medium text-base">
                {{ emailLabel }}
              </Label>
              <Input
                id="email"
                v-model="formData.email"
                type="email"
                class="h-16 px-6 border-2 border-neutral-300"
                :class="{ 'border-red-500': errors.email }"
              />
              <p v-if="errors.email" class="text-red-500 text-sm">
                {{ errors.email }}
              </p>
            </div>

            <!-- Industry -->
            <div class="space-y-2">
              <Label for="industry" class="font-medium text-base">
                {{ industryLabel }} <span class="text-red-500">*</span>
              </Label>
              <Select v-model="formData.industry" required>
                <SelectTrigger 
                  class="h-16 px-6 border-2 border-neutral-300"
                  :class="{ 'border-red-500': errors.industry }"
                >
                  <SelectValue :placeholder="industryPlaceholder" />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem 
                    v-for="option in industryOptions" 
                    :key="option.value"
                    :value="option.value"
                  >
                    {{ option.label }}
                  </SelectItem>
                </SelectContent>
              </Select>
              <p v-if="errors.industry" class="text-red-500 text-sm">
                {{ errors.industry }}
              </p>
            </div>

            <!-- Required Fields Note -->
            <p class="italic text-sm text-zinc-600 mt-6">
              {{ requiredFieldsNote }}
            </p>
          </div>

          <!-- Right Column - Message -->
          <div class="w-full lg:w-2/3 space-y-6">
            
            <!-- Message -->
            <div class="space-y-2">
              <Label for="message" class="font-medium text-base">
                {{ messageLabel }}
              </Label>
              <textarea
                id="message"
                v-model="formData.message"
                :rows="8"
                class="w-full h-64 px-6 py-4 border-2 border-neutral-300 rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                :class="{ 'border-red-500': errors.message }"
              ></textarea>
              <p v-if="errors.message" class="text-red-500 text-sm">
                {{ errors.message }}
              </p>
            </div>

            <!-- Submit Button -->
            <Button
              type="submit"
              class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold h-16 px-9 rounded-3xl"
              :disabled="loading"
            >
              <span v-if="loading">
                <Loader2 class="w-5 h-5 animate-spin mr-2" />
                {{ sendingText }}
              </span>
              <span v-else>
                {{ submitButtonText }}
              </span>
            </Button>

            <!-- Success Message -->
            <div 
              v-if="successMessage" 
              class="p-4 bg-green-50 border border-green-200 rounded-md text-green-700"
            >
              {{ successMessage }}
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- Maps and Contact Information Sections -->
  <template v-if="showMaps && locations && locations.length > 0">
    <section 
      v-for="(location, index) in locations" 
      :key="index"
      :class="[
        'w-full',
        index === 0 ? 'mt-24 min-[576px]:mt-36 min-[1025px]:mt-36' : ''
      ]"
    >
      <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex flex-col md:flex-row">
          
          <!-- Map Section (left on first location, right on second) -->
          <div 
            :class="[
              'flex min-h-[0.06rem] w-full md:w-1/2',
              index % 2 === 0 ? 'order-1' : 'order-2'
            ]"
          >
            <div class="content-start flex-wrap flex w-full">
              <div class="flex-col w-full overflow-hidden">
                <div>
                  <iframe 
                    :src="location.mapUrl" 
                    class="w-full h-72 max-w-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Information Section (right on first location, left on second) -->
          <div 
            :class="[
              'flex min-h-[0.06rem] text-[1.38rem] leading-7 text-zinc-800 font-bold w-full md:w-1/2',
              index % 2 === 0 ? 'order-2' : 'order-1'
            ]"
          >
            <div class="content-start flex-wrap flex w-full">
              <div class="flex-col w-full">
                <div class="px-4 w-full min-[576px]:w-1/2">
                  <div class="pb-3.5">
                    <p class="mt-3">
                      <strong class="text-indigo-900 text-base font-black pb-3">Address</strong>
                      <span v-html="location.address"></span>
                    </p>
                    <p class="mt-3">
                      <strong class="text-indigo-900 text-base font-black pb-3">Phone number</strong>
                      {{ location.phone }}
                    </p>
                    <p class="mt-3">
                      <strong class="text-indigo-900 text-base font-black pb-3">Email</strong>
                      {{ location.email }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
</template>













