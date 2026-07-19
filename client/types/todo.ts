import type { ApiCategory, Category } from './category';
import type { ApiType } from './__types';

export type ApiTodo = ApiType & {
    id: number;
    user_id: number;
    category_id: number | null;
    title: string;
    description: string | null;
    is_checked: boolean;
    checked_at: string | null;
    deleted_at: string | null;
    created_at: string;
    updated_at: string;
    category: ApiCategory | null;
};

export type Todo = {
    id: number;
    userId: number;
    categoryId: number | null;
    title: string;
    description: string | null;
    isChecked: boolean;
    checkedAt: string | null;
    deletedAt: string | null;
    createdAt: string;
    updatedAt: string;
    category: Category | null;
};
