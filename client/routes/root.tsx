import { createRootRoute, Outlet } from '@tanstack/react-router';
import NavBar from '../components/NavBar';

const Root = () => {
    return (
        <div>
            <header className="bg-gray-100 flex justify-between items-center px-2">
                <h1>Todo App</h1>
                <NavBar />
            </header>
            <main className={'p-4'}>
                <Outlet />
            </main>
        </div>
    );
};

export const rootRoute = createRootRoute({
    component: Root,
});

export default Root;
