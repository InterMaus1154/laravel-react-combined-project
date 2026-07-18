import { createRoute } from '@tanstack/react-router';
import { rootRoute } from './root';
import Home from '../pages/index/Home';

export const indexRoute = createRoute({
    getParentRoute: () => rootRoute,
    component: Home,
    path: '/',
});
