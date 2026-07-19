import type { ApiTodo, Todo } from '../types/todo';
import { categoryFromApi } from './category';

export const todoFromApi = (raw: ApiTodo): Todo => ({
    id: raw.id,
    title: raw.title,
    description: raw.description,
    isChecked: raw.is_checked,
    checkedAt: raw.checked_at,
    categoryId: raw.category_id,
    deletedAt: raw.deleted_at,
    createdAt: raw.created_at,
    updatedAt: raw.updated_at,
    category: raw.category ? categoryFromApi(raw.category) : null,
    userId: raw.user_id,
});
