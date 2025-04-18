<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    courses: Array
});

</script>
<template>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div v-for="course in courses" class="cols-span-1 border bg-white rounded-lg shawdow p-4">
        <h1 class="text-xl font-bold">{{ course.name }}</h1>
        <p class="font-sm">{{ course.description }}</p>
        <div class="mt-4">
            <Link :href="route('courses.view', {course: course.id})" class="mr-2">View</Link>
            <Link :href="route('courses.edit', {course: course.id})">Edit</Link>
        </div>
        </div>
    </div>
</template>