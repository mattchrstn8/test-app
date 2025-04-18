<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import MyCourses from './MyCourses.vue';
import Container from '@/Components/Container.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

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

        <Container class="py-4">
            <MyCourses :courses="courses" />
       
            <div class="mt-8">
            <PrimaryButton @click="courseCreate()">click this</PrimaryButton>
            </div>
        </Container>
        <div>
            {{ page.props.auth.user.id }}
        </div>
</AppLayout>
</template>