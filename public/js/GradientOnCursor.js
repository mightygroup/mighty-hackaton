export class GradientOnCursor {

    _elementsToUpdate = [];

    constructor() {
        window.addEventListener('mousemove', this._onMouseMove.bind(this));
    }

    addElementsToUpdate(...elements) {
        this._elementsToUpdate.push(...elements);
    }

    _onMouseMove(event) {
        const radians = this._getCursorAngleFromCenter(event);
        const degrees = this._radToDeg(radians);
        this._updateElements(degrees);
    }

    _updateElements(degrees) {
        this._elementsToUpdate.forEach(element => {
            element.style.background = `linear-gradient(${degrees}deg, #FF0083, #FFA600)`;
        });
    }

    _getCenterOfViewPort() {
        const width = window.innerWidth;
        const height = window.innerHeight;
        return {
            x: width / 2,
            y: height / 2
        };
    }

    _getDistanceFromCenter(mouse) {
        const viewportCenter = this._getCenterOfViewPort();
        return {
            x: mouse.x - viewportCenter.x,
            y: mouse.y - viewportCenter.y
        };
    }

    _getCursorAngleFromCenter(mouse) {
        const mouseDistanceFromCenter = this._getDistanceFromCenter(mouse);
        return Math.atan2(mouseDistanceFromCenter.y, mouseDistanceFromCenter.x);
    }

    _radToDeg(rad) {
        return rad * (180 / Math.PI);
    }

}