import { createRoute } from '@tanstack/react-router';
import { rootRoute } from './root';
import Todos from '../pages/todos/Todos';
import TodoDetail from '../pages/todos/TodoDetail';

export const todoRoute = createRoute({
    getParentRoute: () => rootRoute,
    component: Todos,
    path: '/todos',
});

export const todoDetailRoute = createRoute({
    getParentRoute: () => todoRoute,
    component: TodoDetail,
    path: '/$todoId',
});
