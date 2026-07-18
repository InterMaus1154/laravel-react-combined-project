import { createRootRoute, Outlet } from '@tanstack/react-router';

const Root = () => {
    return (
        <main>
            <Outlet />
        </main>
    );
};

export const rootRoute = createRootRoute({
    component: Root,
});

export default Root;
