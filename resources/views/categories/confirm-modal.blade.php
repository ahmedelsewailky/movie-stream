<div class="modal fade confirm-modal" id="confirmDelete{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class='bx bx-error'></i>
                        </div>
                        <div class="flex-grow-1">
                            <p>انت الآن علي وشك حذف هذا السجل، <strong>هل أنت متأكد من هذا الإجراء؟</strong></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">نعم! متأكد</button>
                </div>
            </form>
        </div>
    </div>
</div>
