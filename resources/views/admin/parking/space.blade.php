@extends('admin.includes.master')
@section('title', 'Spaces')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    #canvas-wrapper {
        overflow: auto;
        border: 2px solid #ccc;
        padding: 0;
        width: 100%;
    }

    #canvas-container {
        position: relative;
        width: 100%;
        height: 4000px;
        background-color: #ffffff;
        transform-origin: top left;
        overflow: hidden;
    }

    .parking-space {
        position: absolute;
        width: 100px;
        height: 60px;
        background-color: transparent;
        border: 0;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        cursor: move;
        z-index: 2;
        transform-origin: center center;
    }

    .parking-icon {
        display: flex;
        align-items: center;
    }

    .vehicle-icon {
        width: 40px;
        height: 40px;
    }

    .parking-label {
        margin-left: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
    }

    .entry, .exit {
        position: absolute;
        padding: 6px 12px;
        background-color: green;
        color: white;
        border-radius: 4px;
        font-weight: bold;
        cursor: move;
        z-index: 2;
    }

    .road {
        position: absolute;
        background-color: #ccc;
        z-index: 1;
        min-width: 40px;
        min-height: 40px;
        resize: both;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
        cursor: move;
    }

    .horizontal-road { height: 40px; width: 300px; }
    .vertical-road { width: 40px; height: 300px; }

    .toolbox { margin-bottom: 20px; }
    .toolbox button { margin-right: 10px; }
</style>

<div class="container">
    <h3>Parking Layout Builder</h3>

    <div class="toolbox">
        <button class="btn btn-primary mb-2" onclick="addSpace('car')">Add Car</button>
        <button class="btn btn-warning mb-2" onclick="addSpace('bike')">Add Bike</button>
        <button class="btn btn-danger mb-2" onclick="addSpace('heavy')">Add Heavy</button>
        <button class="btn btn-success mb-2" onclick="addEntry()">Add Entry</button>
        <button class="btn btn-success mb-2" onclick="addExit()">Add Exit</button>
        <button class="btn btn-secondary mb-2" onclick="addRoad('horizontal')">Add Horizontal Road</button>
        <button class="btn btn-secondary mb-2" onclick="addRoad('vertical')">Add Vertical Road</button>
        <button class="btn btn-outline-primary mb-2" onclick="zoomIn()">Zoom In</button>
        <button class="btn btn-outline-primary mb-2" onclick="zoomOut()">Zoom Out</button>
        <button class="btn btn-outline-secondary mb-2" onclick="resetZoom()">Reset Zoom</button>
    </div>

    <form id="layoutForm" method="POST" action="{{ route('admin.parking.slot-save') }}">
        @csrf
        <input type="hidden" name="parking_id" value="{{ $parking->id }}">
        <input type="hidden" name="layout_data" id="layoutData">

        <div class="toolbox">
            <button type="button" class="btn btn-dark" onclick="saveLayout()">Save Layout</button>
        </div>

        <div id="canvas-wrapper">
            <div id="canvas-container"></div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<script>
    const container = document.getElementById('canvas-container');
    let counter = { car: 1, bike: 1, heavy: 1 };
    let zoomLevel = 1;

    function createBox(type, label, className, width = 100, height = 60, x = 10, y = 10, rotation = 0) {
        const div = document.createElement('div');
        div.className = className;
        div.dataset.type = type;
        div.style.left = '0px';
        div.style.top = '0px';
        div.style.width = width + 'px';
        div.style.height = height + 'px';
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.style.transform = `translate(${x}px, ${y}px)`;

        if (type === 'car' || type === 'bike' || type === 'heavy') {
            let imgSrc = '';
            if (type === 'car') imgSrc = '/widget-img/car.png';
            if (type === 'bike') imgSrc = '/widget-img/bike.png';
            if (type === 'heavy') imgSrc = '/widget-img/heavy.png';

            div.innerHTML = `
                <div class="parking-icon">
                    <img src="${imgSrc}" class="vehicle-icon" data-rotation="${rotation}" style="transform: rotate(${rotation}deg)" />
                    <span class="parking-label">${label}</span>
                </div>`;

            const img = div.querySelector('.vehicle-icon');
            const labelSpan = div.querySelector('.parking-label');

            img.addEventListener('dblclick', (e) => {
                e.stopPropagation();
                rotateElement(div);
            });

            labelSpan.addEventListener('dblclick', (e) => {
                e.stopPropagation();
                const newLabel = prompt("Enter new label:", labelSpan.innerText);
                if (newLabel) labelSpan.innerText = newLabel;
            });
        } else if (type.includes('road')) {
            const span = document.createElement('span');
            span.innerText = label || 'Double-click';
            div.appendChild(span);
            div.addEventListener('dblclick', () => {
                const newLabel = prompt("Enter road title:", span.innerText);
                if (newLabel !== null) span.innerText = newLabel;
            });
        } else {
            div.innerText = label;
        }

        container.appendChild(div);
        makeDraggable(div);
        if (type.includes('road')) makeResizable(div);
    }

    function addSpace(type) {
        const label = (type === 'bike' ? 'B' : type === 'car' ? 'C' : 'H') + counter[type]++;
        createBox(type, label, `parking-space ${type}`);
    }

    function addEntry() {
        createBox('entry', 'ENTRY', 'entry', 80, 40);
    }

    function addExit() {
        createBox('exit', 'EXIT', 'exit', 80, 40);
    }

    function addRoad(orientation) {
        const className = `road ${orientation === 'horizontal' ? 'horizontal-road' : 'vertical-road'}`;
        createBox('road-' + orientation, '', className);
    }

    function makeDraggable(element) {
        interact(element).draggable({
            modifiers: [interact.modifiers.restrictRect({ restriction: container, endOnly: true })],
            listeners: {
                move(event) {
                    const x = (parseFloat(event.target.getAttribute('data-x')) || 0) + event.dx;
                    const y = (parseFloat(event.target.getAttribute('data-y')) || 0) + event.dy;
                    event.target.style.transform = `translate(${x}px, ${y}px)`;
                    event.target.setAttribute('data-x', x);
                    event.target.setAttribute('data-y', y);
                }
            }
        });
    }

    function makeResizable(element) {
        interact(element).resizable({
            edges: { left: true, right: true, bottom: true, top: true },
            listeners: {
                move(event) {
                    let x = parseFloat(event.target.getAttribute('data-x')) || 0;
                    let y = parseFloat(event.target.getAttribute('data-y')) || 0;

                    Object.assign(event.target.style, {
                        width: `${event.rect.width}px`,
                        height: `${event.rect.height}px`,
                        transform: `translate(${x + event.deltaRect.left}px, ${y + event.deltaRect.top}px)`
                    });

                    event.target.setAttribute('data-x', x + event.deltaRect.left);
                    event.target.setAttribute('data-y', y + event.deltaRect.top);
                }
            }
        });
    }

    function rotateElement(el) {
        const img = el.querySelector('.vehicle-icon');
        if (!img) return;

        let rotation = parseInt(img.getAttribute('data-rotation')) || 0;
        rotation = (rotation + 90) % 360;
        img.style.transform = `rotate(${rotation}deg)`;
        img.setAttribute('data-rotation', rotation);
    }

    function saveLayout() {
        const layout = [];

        container.querySelectorAll('.parking-space, .entry, .exit, .road').forEach(el => {
            const type = el.dataset.type;
            const x = parseFloat(el.getAttribute('data-x')) || 0;
            const y = parseFloat(el.getAttribute('data-y')) || 0;
            const width = el.offsetWidth;
            const height = el.offsetHeight;

            let label = el.querySelector('.parking-label')?.innerText || el.querySelector('span')?.innerText || el.innerText.trim();
            let rotation = 0;

            if (type === 'car' || type === 'bike' || type === 'heavy') {
                const img = el.querySelector('.vehicle-icon');
                rotation = parseInt(img?.getAttribute('data-rotation')) || 0;
            }

            layout.push({ type, label, x, y, width, height, rotation });
        });

        document.getElementById('layoutData').value = JSON.stringify(layout);
        document.getElementById('layoutForm').submit();
    }

    function zoomIn() { zoomLevel += 0.1; container.style.transform = `scale(${zoomLevel})`; }
    function zoomOut() { zoomLevel = Math.max(0.2, zoomLevel - 0.1); container.style.transform = `scale(${zoomLevel})`; }
    function resetZoom() { zoomLevel = 1; container.style.transform = `scale(1)`; }

    // Render saved layout from backend
    const slots = @json($slots);
    slots.forEach(slot => {
        let className = 'entry';
        if (slot.type === 'exit') className = 'exit';
        else if (slot.type.includes('road')) className = `road ${slot.type.includes('horizontal') ? 'horizontal-road' : 'vertical-road'}`;
        else className = `parking-space ${slot.type}`;

        createBox(slot.type, slot.label, className, slot.width, slot.height, slot.x, slot.y, slot.rotation || 0);
    });
</script>

@endsection
