<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Checkbox } from '@/components/ui/checkbox'
import { Card, CardContent } from '@/components/ui/card'

// Define props interface
interface Props {
  title?: string
  usernameLabel?: string
  usernamePlaceholder?: string
  passwordLabel?: string
  passwordPlaceholder?: string
  rememberMeText?: string
  submitButtonText?: string
  lostPasswordText?: string
  lostPasswordLink?: string
  registerPrompt?: string
  registerButtonText?: string
  registerLink?: string
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  title: 'Login',
  usernameLabel: 'Username or email address',
  usernamePlaceholder: 'Enter your username or email',
  passwordLabel: 'Password',
  passwordPlaceholder: 'Enter your password',
  rememberMeText: 'Remember me',
  submitButtonText: 'Log in',
  lostPasswordText: 'Lost your password?',
  lostPasswordLink: '/forgot-password',
  registerPrompt: "Don't have an account?",
  registerButtonText: 'Create an account',
  registerLink: '/register'
})

// Reactive form data
const formData = ref({
  username: '',
  password: '',
  rememberMe: false
})

const loading = ref(false)
const errorMessage = ref('')

// Form submission handler
const handleSubmit = async () => {
  if (!formData.value.username || !formData.value.password) {
    errorMessage.value = 'Please fill in all required fields.'
    return
  }

  loading.value = true
  errorMessage.value = ''

  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 1000))
    
    // Handle successful login
    console.log('Login successful:', formData.value)
    
    // Redirect or handle success
    // router.push('/dashboard')
    
  } catch (error) {
    errorMessage.value = 'Invalid username or password. Please try again.'
  } finally {
    loading.value = false
  }
}
</script>


<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36 bg-white">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <div class="flex flex-wrap -m-3.5">
        <div class="w-full px-4">
          
          <!-- Section Header -->
          <h2 class="text-zinc-800 text-[2.50rem] leading-none font-bold pb-9 mb-2">
            {{ title }}
          </h2>

          <!-- Login Form -->
          <Card class="w-full shadow-none border-0">
            <CardContent class="p-6">
              <form @submit.prevent="handleSubmit" class="space-y-6">
                
                <!-- Username/Email Field -->
                <div class="space-y-2">
                  <Label for="username" class="text-base font-medium">
                    {{ usernameLabel }} <span class="text-red-500">*</span>
                    <span class="sr-only">Required</span>
                  </Label>
                  <Input
                    id="username"
                    v-model="formData.username"
                    type="text"
                    :placeholder="usernamePlaceholder"
                    required
                    class="h-16 px-6 text-base border-2 border-neutral-300"
                  />
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                  <Label for="password" class="text-base font-medium">
                    {{ passwordLabel }} <span class="text-red-500">*</span>
                    <span class="sr-only">Required</span>
                  </Label>
                  <Input
                    id="password"
                    v-model="formData.password"
                    type="password"
                    :placeholder="passwordPlaceholder"
                    required
                    class="h-16 px-6 text-base border-2 border-neutral-300"
                  />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center space-x-2">
                  <Checkbox
                    id="remember"
                    v-model="formData.rememberMe"
                  />
                  <Label for="remember" class="text-base font-medium cursor-pointer">
                    {{ rememberMeText }}
                  </Label>
                </div>

                <!-- Submit Button -->
                <Button
                  type="submit"
                  class="w-full bg-indigo-900 hover:bg-indigo-800 text-white font-bold h-16 rounded-3xl text-base"
                  :disabled="loading"
                >
                  <span v-if="loading">Logging in...</span>
                  <span v-else>{{ submitButtonText }}</span>
                </Button>

                <!-- Lost Password Link -->
                <div class="text-center">
                  <a 
                    :href="lostPasswordLink" 
                    class="text-indigo-900 hover:text-indigo-700 text-base font-medium"
                  >
                    {{ lostPasswordText }}
                  </a>
                </div>

                <!-- Error Message -->
                <div 
                  v-if="errorMessage" 
                  class="p-3 bg-red-50 border border-red-200 rounded text-red-700 text-sm"
                >
                  {{ errorMessage }}
                </div>
              </form>
            </CardContent>
          </Card>

          <!-- Additional Links -->
          <div class="text-center mt-8">
            <p class="text-zinc-600 mb-4">
              {{ registerPrompt }}
            </p>
            <Button
              as-child
              variant="outline"
              class="border-indigo-900 text-indigo-900 hover:bg-indigo-50 h-12 px-8 rounded-3xl"
            >
              <a :href="registerLink">
                {{ registerButtonText }}
              </a>
            </Button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>