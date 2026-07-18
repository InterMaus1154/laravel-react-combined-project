import { rootRoute } from './routes/root';
import { indexRoute } from './routes';
import { createRouter } from '@tanstack/react-router';
import { todoDetailRoute, todoRoute } from './routes/todos';

const routeTree = rootRoute.addChildren([
    indexRoute,
    todoRoute.addChildren([todoDetailRoute]),
]);

export const router = createRouter({ routeTree });

declare module '@tanstack/react-router' {
    interface Register {
        router: typeof router;
    }
}
