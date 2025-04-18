<script setup>
import Container from '@/Components/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    course: Object
});

</script>

<template>
    <AppLayout title="View Courses">
        <template #header>
            {{ course.name }}
        </template>
        <Container>
            <h1>Course Details</h1>
            <p>{{course.id}}</p>
            <p>{{course.name}}</p>
            <p>{{course.description}}</p>
        </Container>
    </AppLayout>
</template>