<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import MyCourses from './MyCourses.vue';

const page = usePage()

const props = defineProps({
    courses: Array
})

const courseCreate = () => {
  router.post(route('courses.create', {user: page.props.auth.user.id }))
}
</script>
<template>
<AppLayout title="Courses">
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courses
            </h2>
        </template>

        <MyCourses :courses="courses" />

        <div>
            this is the data
        </div>

        <div>
            <button @click="courseCreate()">click this</button>
        </div>
        
        <div>
            {{ page.props.auth.user.id }}
        </div>
</AppLayout>
</template>