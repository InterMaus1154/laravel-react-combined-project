import type { ApiCategory, Category } from '../types/category';

export const categoryFromApi = (raw: ApiCategory): Category => ({
    id: raw.id,
    name: raw.name,
    createdAt: raw.created_at,
});
