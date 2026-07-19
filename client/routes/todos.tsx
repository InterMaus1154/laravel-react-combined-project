import { createRoute } from '@tanstack/react-router';
import { z } from 'zod';
import { rootRoute } from './root';
import Todos from '../pages/todos/Todos';
import TodoDetail from '../pages/todos/TodoDetail';

export const todoSearchSchema = z.object({
    page: z.number().catch(1),
});

export const todoRoute = createRoute({
    getParentRoute: () => rootRoute,
    component: Todos,
    path: '/todos',
    validateSearch: todoSearchSchema,
});

export const todoDetailRoute = createRoute({
    getParentRoute: () => todoRoute,
    component: TodoDetail,
    path: '/$todoId',
});
